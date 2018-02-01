<?php

// echo '<pre>', print_r(PDO::getAvailableDrivers()), '</pre>';

// table info
/*
$db = new PDO('sqlite:db.sqlite');
$db->exec("CREATE TABLE IF NOT EXISTS users (
                                            uname TEXT PRIMARY KEY,
                                            pw TEXT,
                                            sid TEXT,
                                            bco INTEGER,
                                            wins INTEGER,
                                            b TEXT,
                                            i TEXT,
                                            n TEXT,
                                            g TEXT,
                                            o TEXT);");
*/

$message = '';
$pn = rand(1, 1024);
$users = user_gen();

if(!isset($_SESSION['c_user'])) {
    $c_user = new User('anonymous', 'cisco');
    $_SESSION['c_user'] = $c_user;
} else {
    $c_user = &$_SESSION['c_user'];
}

$message = ''; //print_r($_SESSION['c_user'], true);

$bc = [];

if(isset($c_user)) {
    $bc = [ 'b' => explode(",", $c_user->getB()),
            'i' => explode(",", $c_user->getI()),
            'n' => explode(",", $c_user->getN()),
            'g' => explode(",", $c_user->getG()),
            'o' => explode(",", $c_user->getO())
    ];
} else {
    $bc = [ 'b' => ['b0', 'b1', 'b2', 'b3', 'b4'],
            'i' => ['i0', 'i1', 'i2', 'i3', 'i4'],
            'n' => ['n0', 'n1', 'n2', 'n3', 'n4'],
            'g' => ['g0', 'g1', 'g2', 'g3', 'g4'],
            'o' => ['o0', 'o1', 'o2', 'o3', 'o4']
    ];
}

if (isset($_GET['oculus'])){
    try{
        if($_GET['oculus'] == 'help'){
            require_once 'views/oculus_help_view.php';
            return;
        }

        if($_GET['oculus'] == 'home'){
            require_once 'views/oculus_bingo_view.php';
            return;
        }

        if($_GET['oculus'] == 'useradd'){

            require_once 'views/oculus_useradd_view.php';
            return;
        }

        if($_GET['oculus'] == 'userdel'){

            require_once 'views/oculus_userdel_view.php';
            return;
        }

        if($_GET['oculus'] == 'restart'){

            $users;

            foreach ($users as $user) {
                $user->bingo_gen();
                $user->setBco(0);

                // echo '<pre>', print_r($user), '</pre>';
                // echo '<pre>', print_r($user->toDB()), '</pre>';
                user_update($user);
            }

            $users = user_gen();

            require_once 'views/oculus_bingo_view.php';
            return;

        }

        if($_GET['oculus'] == 'login'){

            $sid;
            $users;

            if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && isset($users[$_SERVER['PHP_AUTH_USER']]) && $_SERVER['PHP_AUTH_PW'] === $users[$_SERVER['PHP_AUTH_USER']]->getPw()) {
                $c_user = $users[$_SERVER['PHP_AUTH_USER']];
                $c_user->setSid(uniqid('SID', true));
                // echo '<pre>', print_r($users), '</pre>';
                user_update($c_user);

            } else if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
                header('WWW-Authenticate: Basic realm="Bingo"');
                header('HTTP/1.0 401 Unauthorized');

                if(isset($_SERVER['PHP_AUTH_USER']))
                    // echo $_SERVER['PHP_AUTH_USER'];
                    unset($_SERVER['PHP_AUTH_USER']);

                if (isset($_SERVER['PHP_AUTH_PW']))
                    // echo $_SERVER['PHP_AUTH_PW'];
                    unset($_SERVER['PHP_AUTH_PW']);

            } else {
                header('WWW-Authenticate: Basic realm="Bingo"');
                header('HTTP/1.0 401 Unauthorized');
            }

            require_once 'views/base_view.php';
            return;
        }

        if($_GET['oculus'] == 'logout'){
            header('HTTP/1.0 401 Unauthorized');

            if(isset($_SERVER['PHP_AUTH_USER']))
                // echo $_SERVER['PHP_AUTH_USER'];
                unset($_SERVER['PHP_AUTH_USER']);

            if (isset($_SERVER['PHP_AUTH_PW']))
                // echo $_SERVER['PHP_AUTH_PW'];
                unset($_SERVER['PHP_AUTH_PW']);

            $c_user = new User('anonymous', 'cisco');

            require_once 'views/base_view.php';
            return;
        }

        if($_GET['oculus'] == 'about'){
            require_once 'views/oculus_about_view.php';
            return;
        }

    }catch (Exception $e){
        // echo $e->getMessage();
        die();

    }
}

if (isset($_POST['get_bco'])) {

    if($_POST['get_bco'] == 'c_user'){
        // echo for ajax callback !!!not view!!!
        echo $c_user->getBco();
        return;
    }

    if($_POST['get_bco'] == 'all_user') {
        $bcos = [];
        foreach ($users as $user) {
            // echo for ajax callback !!!not view!!!
            echo $user->getUname() . ',' . $user->getBco(). ';' ;
            //$bcos[$user->getUname()] = $user->getBco();
        }
        return;
    }

}

if (isset($_POST['bco'])) {
    $c_user->setBco($_POST['bco']);
    user_update($c_user);

    // echo for ajax callback !!!not view!!!
    echo $c_user->getBco();
    return;
}

if (isset($_POST['action_useradd'])) {
    if (isset($_POST['uname']) && isset($_POST['pw']) && isset($_POST['re_pw']) && $_POST['uname'] != '' && $_POST['pw'] == $_POST['re_pw']) {
        user_update(new User($_POST['uname'], $_POST['pw']));

    }

    $users = user_gen();

    require_once 'views/oculus_bingo_view.php';
    return;
}

if (isset($_POST['action_userdel'])) {
    if (isset($_POST['selection'])) {
        user_del($_POST['selection']);
    }

    $users = user_gen();

    require_once 'views/oculus_bingo_view.php';
    return;
}

function user_gen() {
    try{

        $users = [];
        // load/create the sqliteDB
        $db = new PDO('sqlite:db.sqlite');

        // config ex
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // select query
        $result = $db->query("SELECT * FROM users;");

        while($row = $result->fetch()) {
            $user = new User($row['uname'], $row['pw']);
            $user->setWins($row['wins']);
            $user->setBco($row['bco']);
            $user->setSid($row['sid']);
            $user->setB($row['b']);
            $user->setI($row['i']);
            $user->setN($row['n']);
            $user->setG($row['g']);
            $user->setO($row['o']);
            $users[$row['uname']] = $user;
        }

        // echo '<pre>', print_r($result->fetch()), '</pre>';

        // close connection
        $db = null;

        // return users
        return $users;

    }catch (PDOException $e){
        // echo $e->getMessage();
        die();

    }
}

function user_update($user) {
    try{
        // load/create the sqliteDB
        $db = new PDO('sqlite:db.sqlite');

        // config ex
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // update user
        //$db->query("DELETE FROM users WHERE uname = '" . $user->getUname() . "'");
        // $db->query("INSERT INTO users (uname, pw, sid, bc, wins, b, i, n, g, o)
        //       VALUES ('wernig', 'cisco', 'SID2', 0, 0, '81,65,117,72,197', '291,209,307,393,388', '468,410,0,612,424', '786,809,691,781,743', '1011,986,909,847,828');");
        //$db->query((new User('wernig','cisco'))->toDB());


        // echo '<pre>', print_r($user->toDB()), '</pre>';

        $db->query($user->toDB());

        // echo 'pls work';

        // close connection
        $db = null;

    }catch (PDOException $e){
        // echo $e->getMessage();
        die();

    }
}

function user_del($uname) {
    try{
        // load/create the sqliteDB
        $db = new PDO('sqlite:db.sqlite');

        // config ex
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // del user
        $db->query("DELETE FROM users WHERE uname = '" . $uname . "'");

        // close connection
        $db = null;

    }catch (PDOException $e){
        // echo $e->getMessage();
        die();

    }
}

require_once 'views/base_view.php';