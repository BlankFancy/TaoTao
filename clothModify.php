<?php
require_once('./conn.php');

echo "<p>".$_COOKIE['u_name']."管理员，您好！<a href='homeOrignal.php?action=logout'>退出</a></p>";
if(isset($_GET['action'])&&$_GET['action']=='logout'){
    setcookie('u_name','',time()-1);
    header("Location:homeOrignal.php");
}
$page_title = '修改衣物类商品信息';
echo '<h1 id="mainhead">衣物类</h1>';
include('./headerCloth.html');
echo "<hr>";
$sql = "SELECT * FROM cloth";
//执行SQL命令返回结果
$result = @mysqli_query ($dbc,$sql);
//返回结果中的纪录数
$num = mysqli_num_rows($result);

if ($num > 0) {
    echo "<p>共有 $num 件衣物类商品</p>\n";

    echo '<table border="1" width="450" align="left">';
    echo <<<TR
	<tr>
		<td><center><b>序号</b></center></td>
		<td><center><b>商品名称</b></center></td>
		<td><center><b>价格/元</b></center></td>
		<td><center><b>操作</b></center></td>
		</tr>
TR;
    while($row = mysqli_fetch_row($result)){
        echo '<tr>';
        echo '<td><center>'.$row[0] .'</center></td>';
        echo '<td><center>'.$row[1] .'</center></td>';
        echo '<td><center>'.$row[2] .'</center></td>';
        echo "<td><center><a href='clothUpdate_form.php?id=$row[0]'>修改</a></center></td>";
        echo '</tr>';
    }
    echo'</table>';

    mysqli_free_result ($result);

} else {
    echo '<p class="error">当前还没有此商品。</p>';
}

mysqli_close($dbc);
?>