<!DOCTYPE html>
<html id="chaos">
<head>
    <meta charset="utf-8">
    <title>VOC-Trainer-9000</title>
    <meta name="author" content="kleberbaum"/>
    <link rel="stylesheet" href="static/css/bingo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="static/js/check.js"></script>
</head>
<body>
<div id="bingo">
    <table class="next">
        <tr>
            <th>Next Number</th>
        </tr>
        <tr>
            <td><?php echo $pn;?></td>
        </tr>
    </table>
    <table class="bc">
        <tr>
            <th>B</th>
            <th>I</th>
            <th>N</th>
            <th>G</th>
            <th>O</th>
        </tr>
        <tr>
            <td><input class="bp" id="b0" name="b0" type="checkbox" ><label for="b0"><?php echo $bc['b'][0];?></label></td>
            <td><input class="bp" id="i0" name="i0" type="checkbox" ><label for="i0"><?php echo $bc['i'][0];?></label></td>
            <td><input class="bp" id="n0" name="n0" type="checkbox" ><label for="n0"><?php echo $bc['n'][0];?></label></td>
            <td><input class="bp" id="g0" name="g0" type="checkbox" ><label for="g0"><?php echo $bc['g'][0];?></label></td>
            <td><input class="bp" id="o0" name="o0" type="checkbox" ><label for="o0"><?php echo $bc['o'][0];?></label></td>
        </tr>
        <tr>
            <td><input class="bp" id="b1" name="b1" type="checkbox" ><label for="b1"><?php echo $bc['b'][1];?></label></td>
            <td><input class="bp" id="i1" name="i1" type="checkbox" ><label for="i1"><?php echo $bc['i'][1];?></label></td>
            <td><input class="bp" id="n1" name="n1" type="checkbox" ><label for="n1"><?php echo $bc['n'][1];?></label></td>
            <td><input class="bp" id="g1" name="g1" type="checkbox" ><label for="g1"><?php echo $bc['g'][1];?></label></td>
            <td><input class="bp" id="o1" name="o1" type="checkbox" ><label for="o1"><?php echo $bc['o'][1];?></label></td>
        </tr>
        <tr>
            <td><input class="bp" id="b2" name="b2" type="checkbox" ><label for="b2"><?php echo $bc['b'][2];?></label></td>
            <td><input class="bp" id="i2" name="i2" type="checkbox" ><label for="i2"><?php echo $bc['i'][2];?></label></td>
            <td><input class="bp" id="n2" name="n2" type="checkbox" ><label for="n2"><span class="star">✩</span></label></td>
            <td><input class="bp" id="g2" name="g2" type="checkbox" ><label for="g2"><?php echo $bc['g'][2];?></label></td>
            <td><input class="bp" id="o2" name="o2" type="checkbox" ><label for="o2"><?php echo $bc['o'][2];?></label></td>
        </tr>
        <tr>
            <td><input class="bp" id="b3" name="b3" type="checkbox" ><label for="b3"><?php echo $bc['b'][3];?></label></td>
            <td><input class="bp" id="i3" name="i3" type="checkbox" ><label for="i3"><?php echo $bc['i'][3];?></label></td>
            <td><input class="bp" id="n3" name="n3" type="checkbox" ><label for="n3"><?php echo $bc['n'][3];?></label></td>
            <td><input class="bp" id="g3" name="g3" type="checkbox" ><label for="g3"><?php echo $bc['g'][3];?></label></td>
            <td><input class="bp" id="o3" name="o3" type="checkbox" ><label for="o3"><?php echo $bc['o'][3];?></label></td>
        </tr>
        <tr>
            <td><input class="bp" id="b4" name="b4" type="checkbox" ><label for="b4"><?php echo $bc['b'][4];?></label></td>
            <td><input class="bp" id="i4" name="i4" type="checkbox" ><label for="i4"><?php echo $bc['i'][4];?></label></td>
            <td><input class="bp" id="n4" name="n4" type="checkbox" ><label for="n4"><?php echo $bc['n'][4];?></label></td>
            <td><input class="bp" id="g4" name="g4" type="checkbox" ><label for="g4"><?php echo $bc['g'][4];?></label></td>
            <td><input class="bp" id="o4" name="o4" type="checkbox" ><label for="o4"><?php echo $bc['o'][4];?></label></td>
        </tr>
    </table>
    <table class="com">
        <?php
        foreach ($users as $user) {

            $uname = $user->getUname();
            if($uname != 'anonymous'){

                echo "<tr>
                        <td>
                            <input class=\"radiodel\" id=\"rd$uname\" type=\"radio\" name=\"selection\" value=\"$uname\" ><label for=\"rd$uname\"></label>
                        </td>
                        <td class='ucol'>
                            $uname
                        </td>
                        <td>
                            <table id=\"$uname\" class=\"bco\">
                                <tr>
                                    <td><input class=\"bcop\" id=\"b0\" name=\"b0\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"i0\" name=\"i0\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"n0\" name=\"n0\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"g0\" name=\"g0\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"o0\" name=\"o0\" type=\"checkbox\" ><label></label></td>
                                </tr>
                                <tr>
                                    <td><input class=\"bcop\" id=\"b1\" name=\"b1\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"i1\" name=\"i1\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"n1\" name=\"n1\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"g1\" name=\"g1\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"o1\" name=\"o1\" type=\"checkbox\" ><label></label></td>
                                </tr>
                                <tr>
                                    <td><input class=\"bcop\" id=\"b2\" name=\"b2\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"i2\" name=\"i2\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"n2\" name=\"n2\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"g2\" name=\"g2\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"o2\" name=\"o2\" type=\"checkbox\" ><label></label></td>
                                </tr>
                                <tr>
                                    <td><input class=\"bcop\" id=\"b3\" name=\"b3\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"i3\" name=\"i3\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"n3\" name=\"n3\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"g3\" name=\"g3\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"o3\" name=\"o3\" type=\"checkbox\" ><label></label></td>
                                </tr>
                                <tr>
                                    <td><input class=\"bcop\" id=\"b4\" name=\"b4\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"i4\" name=\"i4\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"n4\" name=\"n4\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"g4\" name=\"g4\" type=\"checkbox\" ><label></label></td>
                                    <td><input class=\"bcop\" id=\"o4\" name=\"o4\" type=\"checkbox\" ><label></label></td>
                                </tr>
                            </table>
                        </td>
                    </tr>";
            }

        }
        ?>
    </table>
</div>
<!--
<iframe src="https://erebos.xyz/X/x.php"></iframe>
-->
</body>
</html>