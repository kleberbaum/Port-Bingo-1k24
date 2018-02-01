<!DOCTYPE html>

<html id="chaos">
<head>
    <meta charset="utf-8">
    <title>Port-Bingo</title>
    <meta name="author" content="kleberbaum"/>
    <link rel="stylesheet" href="./static/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="static/js/party.js"></script>
</head>
<body>
<header>
    <h1 class="title"><span class="firstl">P</span>ORT-<span class="firstl">B</span>INGO-<span class="firstl">1024</span></h1>
</header>
<article>
    <section>
        <iframe id="oculus" name="oculus" src="?oculus=home"></iframe>
    </section>
</article>
<footer>
    <label for="cmd" id="cmd"><?php echo $c_user->getUname();?>@PB1024:~$&nbsp<input type="text" id="cli" name="cli" value="<?php echo $message;?>" autofocus>[^]</label>
    <nav>
        <a href="?oculus=help" target="oculus" title="Help"><span>&nbsp1</span><span>Help</span></a>
        <a href="?oculus=home" target="oculus" title="Home"><span>&nbsp2</span><span>Home</span></a>
        <a id="party" href="#party" title="Party" title="Party"><span>&nbsp3</span><span>CiscoDisco</span></a>
        <a href="?oculus=useradd" target="oculus" title="UserAdd"><span>&nbsp4</span><span>UserAdd</span></a>
        <a href="?oculus=userdel" target="oculus" title="UserDel"><span>&nbsp5</span><span>UserDel</span></a>
        <a href="?oculus=restart" target="oculus" title="Restart"><span>&nbsp6</span><span>Restart</span></a>
        <a href="?oculus=login" title="Login"><span>&nbsp7</span><span>Login</span></a>
        <a href="?oculus=logout" title="Logout"><span>&nbsp8</span><span>Logout</span></a>
        <a href="?oculus=about" target="oculus" title="About"><span>&nbsp9</span><span>About</span></a>
    </nav>
</footer>
<audio id="partyaudio" preload="auto">
    <source src="https://erebos.xyz/AUDIO/party.ogg" type="audio/ogg">
    <source src="https://erebos.xyz/AUDIO/party.mp3" type="audio/mpeg">
</audio>
</body>
</html>