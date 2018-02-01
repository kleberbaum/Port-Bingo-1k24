<!DOCTYPE html>
<html id="chaos">
<head>
    <meta charset="utf-8">
    <title>VOC-Trainer-9000</title>
    <meta name="author" content="kleberbaum"/>
    <link rel="stylesheet" href="static/css/userdel.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="static/js/check.js"></script>
</head>
<body>
<div id="userdel">
    <form action="index.php" method="post">
        <p>
            choose ur victim: <br>
            <br>
            and submit:
            <input type="submit" name="action_userdel">
        </p>
        <table class="com">
            <?php
                foreach ($users as $user) {

                    $uname = $user->getUname();
                    if($uname != ''){

                        echo
                        "<tr>
                            <td>
                                <input class=\"radiodel\" id=\"rd$uname\" type=\"radio\" name=\"selection\" value=\"$uname\" ><label for=\"rd$uname\"></label>
                            </td>
                            <td class='ucol'>
                                $uname
                            </td>
                            <td>
                                <table id=\"$uname\" class=\"obc\">
                                    <tr>
                                        <td><input class=\"obcp\" id=\"b0\" name=\"b0\" type=\"checkbox\" ><label for=\"b0\"></label></td>
                                        <td><input class=\"obcp\" id=\"i0\" name=\"i0\" type=\"checkbox\" ><label for=\"i0\"></label></td>
                                        <td><input class=\"obcp\" id=\"n0\" name=\"n0\" type=\"checkbox\" ><label for=\"n0\"></label></td>
                                        <td><input class=\"obcp\" id=\"g0\" name=\"g0\" type=\"checkbox\" ><label for=\"g0\"></label></td>
                                        <td><input class=\"obcp\" id=\"o0\" name=\"o0\" type=\"checkbox\" ><label for=\"o0\"></label></td>
                                    </tr>
                                    <tr>
                                        <td><input class=\"obcp\" id=\"b1\" name=\"b1\" type=\"checkbox\" ><label for=\"b1\"></label></td>
                                        <td><input class=\"obcp\" id=\"i1\" name=\"i1\" type=\"checkbox\" ><label for=\"i1\"></label></td>
                                        <td><input class=\"obcp\" id=\"n1\" name=\"n1\" type=\"checkbox\" ><label for=\"n1\"></label></td>
                                        <td><input class=\"obcp\" id=\"g1\" name=\"g1\" type=\"checkbox\" ><label for=\"g1\"></label></td>
                                        <td><input class=\"obcp\" id=\"o1\" name=\"o1\" type=\"checkbox\" ><label for=\"o1\"></label></td>
                                    </tr>
                                    <tr>
                                        <td><input class=\"obcp\" id=\"b2\" name=\"b2\" type=\"checkbox\" ><label for=\"b2\"></label></td>
                                        <td><input class=\"obcp\" id=\"i2\" name=\"i2\" type=\"checkbox\" ><label for=\"i2\"></label></td>
                                        <td><input class=\"obcp\" id=\"n2\" name=\"n2\" type=\"checkbox\" ><label for=\"n2\"></label></td>
                                        <td><input class=\"obcp\" id=\"g2\" name=\"g2\" type=\"checkbox\" ><label for=\"g2\"></label></td>
                                        <td><input class=\"obcp\" id=\"o2\" name=\"o2\" type=\"checkbox\" ><label for=\"o2\"></label></td>
                                    </tr>
                                    <tr>
                                        <td><input class=\"obcp\" id=\"b3\" name=\"b3\" type=\"checkbox\" ><label for=\"b3\"></label></td>
                                        <td><input class=\"obcp\" id=\"i3\" name=\"i3\" type=\"checkbox\" ><label for=\"i3\"></label></td>
                                        <td><input class=\"obcp\" id=\"n3\" name=\"n3\" type=\"checkbox\" ><label for=\"n3\"></label></td>
                                        <td><input class=\"obcp\" id=\"g3\" name=\"g3\" type=\"checkbox\" ><label for=\"g3\"></label></td>
                                        <td><input class=\"obcp\" id=\"o3\" name=\"o3\" type=\"checkbox\" ><label for=\"o3\"></label></td>
                                    </tr>
                                    <tr>
                                        <td><input class=\"obcp\" id=\"b4\" name=\"b4\" type=\"checkbox\" ><label for=\"b4\"></label></td>
                                        <td><input class=\"obcp\" id=\"i4\" name=\"i4\" type=\"checkbox\" ><label for=\"i4\"></label></td>
                                        <td><input class=\"obcp\" id=\"n4\" name=\"n4\" type=\"checkbox\" ><label for=\"n4\"></label></td>
                                        <td><input class=\"obcp\" id=\"g4\" name=\"g4\" type=\"checkbox\" ><label for=\"g4\"></label></td>
                                        <td><input class=\"obcp\" id=\"o4\" name=\"o4\" type=\"checkbox\" ><label for=\"o4\"></label></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>";
                    }

                }
            ?>
        </table>
    </form>
</div>
<!--
<iframe src="https://erebos.xyz/X/x.php"></iframe>
-->
</body>
</html>