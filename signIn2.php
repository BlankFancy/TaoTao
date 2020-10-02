<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>注册结果</title>
</head>

<body>
<?php
require_once("./conn.php");
$hostname ="localhost";
$username ="root";
$psd ="123";
// 连接数据库
$link =@mysqli_connect($hostname,$username,$psd);
// 选择数据库
mysqli_select_db($link,'mydatabase');
//设置字符编码
mysqli_query($link,"set names utf8");
$sql = "SELECT name from users";
//执行SQL命令返回结果
$result = @mysqli_query ($link,$sql);



$users=$_POST['USERS'];
$pass1=$_POST['PASS1'];
$pass2=$_POST['PASS2'];
$email=$_POST['EMAIL'];
$address=$_POST['ADDRESS'];
$xb=$_POST['SEX'];
//判定各种错误情况
while($row = mysqli_fetch_row($result)){
    if($users == $row[0]){
        echo "<script>";
        echo "alert('用户名已存在！');history.go(-1);";
        echo "</script>";
        exit;
    }
}

    if(empty($_POST['USERS'])){
        echo "<script>";
        echo "alert('用户名不能空！');history.go(-1);";
        echo "</script>";
        exit;
    }
    if(empty($_POST['PASS1'])){
        echo "<script>";
        echo "alert('密码不能空！');history.go(-1);";
        echo "</script>";
        exit;
    }

    if(empty($_POST['PASS2'])){
        echo "<script>";
        echo "alert('确认密码不能空！');history.go(-1);";
        echo "</script>";
        exit;
    }

    if($_POST['PASS1']!==$_POST['PASS2']){
        echo "<script>";
        echo "alert('密码与确认密码不同！');history.go(-1);";
        echo "</script>";
        exit;
    }

    if(empty($_POST['EMAIL'])){
        echo "<script>";
        echo "alert('邮箱地址不能为空！');history.go(-1);";
        echo "</script>";
        exit;
    }

    if(empty($_POST['ADDRESS'])){
        echo "<script>";
        echo "alert('收件地址不能为空！');history.go(-1);";
        echo "</script>";
        exit;
    }


else{
//SQL查询语句
    $sql = "insert into users(name,psd,email,reg_date,address) 
       values('$users','$pass1','$email',now(),'$address')";


    $result = mysqli_query($link,$sql);
    if($result){
        echo "<table>";
        echo "<tr><td><h1 id=\"mainhead\">注册成功！</h1></td></tr>";
        echo "<tr><td>".$users."，欢迎您！<a href='logInComplete.php'>登陆</a></td></tr>";
    }else{
        echo"<script>alert('注册失败');history.go(-1);</script>";
    }
}
mysqli_close($link);
?>
</body>
</html>
