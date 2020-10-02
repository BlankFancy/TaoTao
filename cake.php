<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>美味糕点</title>
    <style type="text/css">

    </style>
</head>
<body>
<form name="f1" action="" method="post">
    <table border='1' width='300' align='center'>
        <center><font size="10" color="#f0e68c"><B>美味糕点</B></font></center><hr>
        <tr>
            <td colspan="2"><center><a href="home.php">返回首页</a></center></td>
        </tr>
        <?php
        require_once('./conn.php');
        $sql="select * from cake ";
        mysqli_query($dbc," set  names utf8 " ) ;
        $result = mysqli_query($dbc,$sql);
        $i = 1;
        while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
	        echo "<td colspan=\"2\"><center><img src=\"img/g{$row['cake_id']}.png\"></center></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td colspan=\"2\"><center>{$row['name']}<input name=\"cake[]\" type=\"checkbox\" value=\"$i\"></center></td>";
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
        <td><center><a href="nut.php">再买点坚果？</a></center></td>
        <td><center><a href="clothesComplete.php">再买点衣服？</a></center></td>
    </tr>
</table>
<?php
if(isset($_POST['cake'])){
    $arr = $_POST['cake'];
    $value = implode(",",$arr);
    if(isset($_COOKIE['gwc'])){
        $value = $_COOKIE['gwc'].",".$value;
        setcookie('gwc',$value,time()+600);
    }else{
        setcookie('gwc',$value,time()+600);
    }
}