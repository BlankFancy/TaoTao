<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>淘淘</title>
    <style type="text/css">
        .STYLE2{background-color:orange;
            text-align: left;}
    </style>
</head>
<body>
<?php
//弹出界面
//东八时间
date_default_timezone_set('PRC');
$arr = getdate();
$hour = date("H");



$hostname ="localhost";
$username ="root";
$psd ="123";
// 连接数据库
$link =@mysqli_connect($hostname,$username,$psd);
// 选择数据库
mysqli_select_db($link,'mydatabase');
//设置字符编码
mysqli_query($link,"set names utf8");
$sql = "SELECT name,psd from users";
//执行SQL命令返回结果
$result = @mysqli_query ($link,$sql);
?>
<table border='0' width='150' align='left'>
    <tr><td><center><a href="signIn1.php"><font size="3">注册</font></a></center></td>
        <td><center><a href="logInComplete.php"><font size="3">登陆</font></a></center></td>
        <td><center><a href="operator.php"><font size="3">管理员</font></a></center></td>
    </tr>
</table>
<table border='0' width='1200' align='center'>
    <tr>
        <td align="right"><?php
            echo $arr['year'],"-",$arr['mon'],"-",$arr['mday']," ";//日期
            ?>
        </td>
    </tr>
</table>
<hr>
<?php
//问候语
if($hour>=6&&$hour<11){
    echo "<font size='5' color='#4169e1'>上午好！</font>";
}
elseif($hour>=11&&$hour<13){
    echo "<font size='5' color='#4169e1'>中午好!</font>";
}
elseif($hour>=13&&$hour<18){
    echo "<font size='5' color='#4169e1'>下午好！</font>";
}
elseif($hour>=18&&$hour<23){
    echo "<font size='5' color='#4169e1'>晚上好!</font>";
}
else{
    echo "<font size='5' color='orange'>夜深了，注意休息！</font>";
}

if(!empty($_POST)){
    $users = $_POST['u_name'];
    $psd = $_POST['psd'];
    $i = 0;$count = 0;
    while($row = mysqli_fetch_row($result)){
        if($users == $row[0]&&$psd == $row[1]){
            setcookie("u_name",$users,time()+30*24*3600);
            echo $users.",欢迎您的到来！";
            echo "<a href='homeOrignal.php?action=logout'>退出</a>";
            $i++;
            break;
        }elseif($users == $row[0]&&$psd != $row[1]){
            if($count<=3){
                echo "<script>";
                echo "alert('密码错误！');history.go(-1);";
                echo "</script>";
                $count++;
            }else{
                echo "<script>";
                echo "alert('错误次数过多！');history.go(-1);";
                echo "</script>";
                exit;
            }
        }
    }
    if($i==0){
        echo "<script>";
        echo "alert('您尚未注册！');history.go(-1);";
        echo "</script>";
        exit;
    }
}else{
    echo @$_COOKIE['u_name']."!淘淘又与您见面了呢！";
    echo "<a href='homeOrignal.php?action=logout'>退出</a>";
}
//随机生成图片
$letter = array('1','2','3','4','5','6','7','8');
$length = 1;
$arrlength = count($letter);
$string = '';
for($i=0;$i<$length;$i++){
    $string.=$letter[rand(0,$arrlength-1)];
}
$p = '';
$p1 = '';
$p2 = '';
for($i=0;$i<strlen($string);$i++){
    $digt = substr($string,$i,1);
    $p .="<img src=\"img/g{$digt}.jpg\">";
    $p1 .="<img src=\"img/j{$digt}.jpg\">";
    $p2 .="<img src=\"img/y{$digt}.jpg\">";
}
?>
<table border='0' width='1525' align='left'>
    <tr><td><font size="10" color="black"><B>淘淘，越淘越开心！</B></font></td></tr>
</table>
<table border='1' width='1000' align='center'>
    <tr>
        <td class="STYLE2"><center><B><font size="5">商品分类</font></B></center></td>
        <td class="STYLE2"><center><B><font size="5">商品推荐</font></B></center></td>
    </tr>
    <tr>
        <td class="STYLE2"><center><a href="cake.php"><B><font size="5" color="white">美味糕点</font></B></a></center></td>
        <?php
            echo "<td rowspan=\"3\">";
            echo "<center><a href='cake.php'>$p</a>";
            echo ".<a href='nut.php'>$p1</a>";
            echo ".<a href='clothesComplete.php'>$p2</a></center>";
            echo "</td>";
        ?>
    </tr>
    <tr><td class="STYLE2"><center><a href="nut.php"><B><font size="5" color="white">坚果食品</font></B></a></center></td></tr>
    <tr><td class="STYLE2"><center><a href="clothesComplete.php"><B><font size="5" color="white">服装服饰</font></B></a></center></td></tr>
</table>

