<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陆</title>
    <style type="text/css">
        table{
            padding-left:0px;
            width:800px;
            margin:0 auto;
            background:gainsboro;
            font-size:20px;
        }
        div{
            text-align:center;
        }
    </style>
</head>
<body>
<?php
if(!isset($_COOKIE['u_name'])){
    echo <<< TAB
    <form name="f1" action="home.php" method="post">
        <table border="0" cellpadding="5">
        <tr>
                <td colspan="4"><div><h2><center>用户登陆</center></h2></div></td>
            </tr>
        <tr>
            <td width="150"></td>
            <td align="right">用户名：</td>
            <td><input type="text" name="u_name"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td align="right">密码：</td>
            <td><input type="password" name="psd"></td>
            <td></td>        
        </tr>
        <tr>
            <td colspan="4"><center><input type="submit" name="bt" value="登陆"></center></td>
        </tr></table>
        <center><a href="homeOrignal.php"><font size="2">返回首页</font></a></center>
    </form>
TAB;
}else{
    header("Location:home.php?action=login");
}
function clearCookies(){
    setcookie('u_name','',time()-3600);
}
//登出
if(isset($_GET['action'])&&$_GET['action']=='logout'){
    setcookie('u_name','',time()-1);
    header("Location:logInComplete.php");
}
?>
