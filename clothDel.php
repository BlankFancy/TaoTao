<script>
    //删除确认
    function del(){
        if(!window.confirm('是否要删除数据??'))
            return false;
    }
</script>
<?php
echo "<p>".$_COOKIE['u_name']."管理员，您好！<a href='homeOrignal.php?action=logout'>退出</a></p>";
if(isset($_GET['action'])&&$_GET['action']=='logout'){
    setcookie('u_name','',time()-1);
    header("Location:homeOrignal.php");
}

$page_title = '删除商品信息';
require_once('./conn.php');
echo '<h1 id="mainhead">衣物类</h1>';
include ('./headerCloth.html');
$sql = "SELECT * FROM cloth";
//执行SQL命令返回结果
$result = @mysqli_query ($dbc,$sql);
//返回结果中的纪录数
$num = mysqli_num_rows($result);
if ($num > 0) {
    echo "<p>共有 $num 件衣物类商品</p>\n";
    echo <<<TR
	<form name="form1" action="clothDelete.php" method="post">
    <table border="1" width="400" align="left">
    <caption><h1><center>商品信息</center></h1></caption>
    <th><input type="submit" value="删除选择" onclick = "return del();">
    </th><th>编号</th><th>商品名称</th><th>价格/元</th>
TR;
    while($row = mysqli_fetch_row($result)){
        echo '<tr>';
        echo "<td align='center'><input type='checkbox' name='chk[]' value='{$row[0]}'>";
        echo '<td><center>'.$row[0] .'<center></td>';
        echo '<td><center>'.$row[1] .'<center></td>';
        echo '<td><center>'.$row[2] .'<center></td>';
        echo '</tr>';
    }
    echo'</table>';
    mysqli_free_result ($result);
} else {
    echo '<p class="error">当前还没有此商品。</p>';
}

?>