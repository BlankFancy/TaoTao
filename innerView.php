<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员界面</title>
</head>
<body>
<?php
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
//返回结果中的纪录数
$num = mysqli_num_rows($result);

if(!empty($_POST)){
    $users = $_POST['u_name'];
    $psd = $_POST['psd'];
    $i = 0;
    if($users == 'Minion'&&$psd == 123){
        setcookie("u_name",$users,time()+30*24*3600);
        echo "<p>".$users."管理员，您好！<a href='homeOrignal.php?action=logout'>退出</a></p>";
        if(isset($_GET['action'])&&$_GET['action']=='logout'){
            setcookie('u_name','',time()-1);
            header("Location:homeOrignal.php");
        }
        echo <<< TR
<table border='1' width='200' align='left'>
    <tr><td><a href="commodityControl.php"><center>商品管理</center></a></td></tr>
    <tr><td><a href="control.php"><center>用户管理</center></a></td></tr>

TR;
        $i++;
    }elseif($users == 'Minion'&&$psd != 123){
        echo "<script>";
        echo "alert('密码错误！');history.go(-1);";
        echo "</script>";
        $i++;
        exit;
    }
    if($i==0){
        echo "<script>";
        echo "alert('您非管理员！');history.go(-1);";
        echo "</script>";
        exit;
    }
}else{
    echo "<p>".$_COOKIE['u_name']."管理员，您好！<a href='homeOrignal.php?action=logout'>退出</a></p>";
    if(isset($_GET['action'])&&$_GET['action']=='logout'){
        setcookie('u_name','',time()-1);
        header("Location:homeOrignal.php");
    }
    $page_title = '管理员首页';
    echo "<h3><B>请选择：</B></h3>";
    echo <<< TR
<table border='1' width='200' align='left'>
    <tr><td><a href="commodityControl.php"><center>商品管理</center></a></td></tr>
    <tr><td><a href="control.php"><center>用户管理</center></a></td></tr>

TR;

}