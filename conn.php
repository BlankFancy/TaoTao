<?php
//用户管理的connect
$hostname = "localhost";
$database = "mydatabase";
$username = "root";
$password = "123";
$dbc = mysqli_connect($hostname, $username, $password) OR die ('连接数据库失败：' . mysqli_error());
@mysqli_select_db($dbc,$database) OR die ('选择数据库失败：' . mysqli_error());
mysqli_query($dbc," set  names utf8 " ) ;
?>