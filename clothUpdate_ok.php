<?php
$page_title = '修改商品信息成功';
require_once('./conn.php');
echo '<h1 id="mainhead">衣物类</h1>';
include ('./headerCloth.html');

$name=$_POST['name'];
$price=$_POST['price'];
$id=$_POST['id'];

if(!($name and $price)){
    echo "输入不允许为空。<a href='javascript:onclick=history.go(-1)'>返回</a>";
}else{
    // $sql ="update users set name='{$name}',email='{$email}',reg_date='{$email}' where user_id={$id}";
    //$sql = "update users set name='".$name."',email='".$email."',reg_date='". $date."'where user_id=".$id;
    $sql = "update cloth set name='$name',price='$price'where cloth_id=".$id;

    $result=mysqli_query($dbc,$sql);
    if($result){
        echo "<b>修改成功 </b><a href='clothView.php'>查看</a>";
    }else{
        echo "修改失败。";
    }
}

?>