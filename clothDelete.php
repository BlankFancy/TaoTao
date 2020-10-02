<?php
require_once('./conn.php');

echo '<h1 id="mainhead">衣物类</h1>';
include ('./headerCloth.html');

if(count($_POST['chk'])==0){
    echo "<script>alert('请选择要删除的信息');history.go(-1);</script>";
}else{
    for($i=0; $i<count($_POST['chk']);$i++){ //循环执行删除命令
        $sql="delete from cloth where cloth_id=".$_POST['chk'][$i];
        $result=mysqli_query($dbc,$sql);
    }
    if($result){
        echo "<script>alert('删除成功');location='clothView.php'</script>";
    }else{
        echo '删除失败';
    }
}

?>