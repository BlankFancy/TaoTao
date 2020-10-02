<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>服装服饰</title>
    <style type="text/css">

    </style>
</head>
<body>
<form name="f1" action="" method="post">
    <table border='1' width='300' align='center'>
        <center><font size="10" color="#8b0000"><B>服装服饰</B></font></center><hr>
        <tr>
            <td colspan="4"><center><a href="home.php">返回首页</a></center></td>
        </tr>
        <?php
        require_once('./conn.php');
        $sql="select * from cloth ";
        mysqli_query($dbc," set  names utf8 " ) ;
        $result = mysqli_query($dbc,$sql);
        $i = 1;
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td colspan=\"2\"><center><img src=\"img/y{$row['cloth_id']}.png\"></center></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"2\"><center>{$row['name']}<input name=\"clothes[]\" type=\"checkbox\" value=\"$i\"></center></td>";
            $i++;
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"2\"><center>￥{$row['price']}</center></td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td><center><a href=\"shopCartComplete.php\"><img src=\"img/ck.jpg\"</a></center></td>";
        echo "<td><center><img src=\"img/gwc.jpg\" onclick=\"document.forms[0].submit()\"></center></td>";
        echo "</tr>";

        ?>
    </table>
</form>
<table align='center'>
    <tr>
        <td><center><a href="cake.php">再买点糕点？</a></center></td>
        <td><center><a href="nut.php">再买点坚果？</a></center></td>
    </tr>
</table>
<?php
if(isset($_POST['clothes'])){
    $arr = $_POST['clothes'];
    $value = implode(",",$arr);
    if(isset($_COOKIE['gwc2'])){
        $value = $_COOKIE['gwc2'].",".$value;
        setcookie('gwc2',$value,time()+600);
    }else{
        setcookie('gwc2',$value,time()+600);
    }
}