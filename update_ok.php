<?php
$page_title = '修改用户信息成功';
require_once('./conn.php');
include ('./header.html');

$address=$_POST['address'];
$email=$_POST['email'];
$id=$_POST['id'];

if(!($address and $email)){
    echo "输入不允许为空。<a href='javascript:onclick=history.go(-1)'>返回</a>";
}else{
    // $sql ="update users set name='{$name}',email='{$email}',reg_date='{$email}' where user_id={$id}";
    //$sql = "update users set name='".$name."',email='".$email."',reg_date='". $date."'where user_id=".$id;
    $sql = "update users set address='$address',email='$email'where user_id=".$id;

    $result=mysqli_query($dbc,$sql);
    if($result){
        echo "修改成功<a href='userView.php'>查看</a>";
    }else{
        echo "修改失败。";
    }
}

?>