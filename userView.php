<?php
require_once('./conn.php');

echo "<p>".$_COOKIE['u_name']."管理员，您好！<a href='homeOrignal.php?action=logout'>退出</a></p>";
$page_title = '查看当前所有用户';
include('./header.html');
echo "<hr>";

//mysql DATE_FORMAT函数把注册日期格式化
$sql = "SELECT user_id,name, email,DATE_FORMAT(reg_date, '%Y年%m月%d日') AS dr ,address FROM users";
//设置字符编码
mysqli_query($dbc," set  names utf8 " ) ;
//执行SQL命令返回结果
$result = @mysqli_query ($dbc,$sql);
//返回结果中的纪录数
$num = mysqli_num_rows($result);
$pagesize=8;
$pagecount = ceil($num/$pagesize); //总页数
(!isset($_GET['page']))?($page = 1):$page = $_GET['page']; //当前显示页
//当前页数大于总页数，把当前页定义为总页数
($page <= $pagecount)?$page:($page = $pagecount);
//当前页的第一条记录
$f_pageNum = $pagesize * ($page-1);

//通过limit控制查询数量
$sqlstr1 = $sql." limit ".$f_pageNum.",".$pagesize;

$result = mysqli_query($dbc,$sqlstr1) or die("SQL语句执行失败");

echo '<h1 id="mainhead">查看用户</h1>';
if ($num > 0) {
    echo '<table border="0" width="600" align="left">';
    echo <<<TR

	<tr>
		<td width='50'><center><b>序号</b></center></td>
		<td width='90'><center><b>用户名</b></center></td>
		<td width='140'><center><b>邮箱</b></center></td>
		<td width='140'><center><b>收件地址</b></center></td>
		<td width='180'><center><b>注册日期</b></center></td>
		
	</tr>
TR;
    while($row = mysqli_fetch_assoc($result)){
        echo <<<TR
   <tr>
	<td><center>{$row['user_id']}</center></td>
	<td><center>{$row['name']}</center></td>
	<td><center>{$row['email']}</center></td>
	<td><center>{$row['address']}</center></td>
	<td><center>{$row['dr']}</center></td>
  </tr>
TR;
    }


} else {

    echo '<p class="error">当前还没有注册用户。</p>';
}
echo "<tr><td colspan='5'></td></tr>";

echo "<tr><td></td><td></td><td colspan='2'><center>第 $page 页/共 $pagecount 页</center></td>";
echo "<tr><td></td><td></td><td colspan='2'><center>共".$num."条记录</center></td></tr>";

if($page!=1){  //如果当前页不是第1页,则输出有链接的首页与上一页
    echo "<tr><td></td><td></td>";
    echo "<td align='right'><a href='?page=1'>首页</a>&nbsp;";
    echo "<a href= '?page=".($page-1)."'>上一页</a>&nbsp;&nbsp;</center></td>";
}else{//否则输出无链接的首页、上一页
    echo "<tr><td></td><td></td>";
    echo "<td align='right'>首页&nbsp;上一页&nbsp;&nbsp;</center></td>";
}
if($page!=$pagecount){//如果当前页不是最后一页，则输出有链接的下一页和尾页
    echo "<td><a href='?page=".($page+1)."'>下一页</a>&nbsp;";
    echo "<a href='?page=".$pagecount."'>尾页</a>&nbsp;&nbsp;</td>";
    echo "</tr>";
}else{//否则输出无链接的下一页、尾页
    echo "<td>下一页&nbsp;尾页&nbsp;&nbsp;</td>";
    echo "</tr>";
}
echo'</tr></table>';

mysqli_free_result ($result);
mysqli_close($dbc);

?>