<?php
require_once('./conn.php');

echo "<p>".$_COOKIE['u_name']."管理员，您好！<a href='homeOrignal.php?action=logout'>退出</a></p>";
if(isset($_GET['action'])&&$_GET['action']=='logout'){
    setcookie('u_name','',time()-1);
    header("Location:homeOrignal.php");
}
$page_title = '管理员主页';
include('./headerC.html');
echo "<hr>";