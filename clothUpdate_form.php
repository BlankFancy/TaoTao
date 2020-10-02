<?php
$page_title = '修改信息';
require_once('./conn.php');
echo '<h1 id="mainhead">衣物类</h1>';
include ('./headerCloth.html');
$sql="select * from cloth where cloth_id=".$_GET['id'];
//执行SQL命令返回结果
$result = mysqli_query($dbc,$sql);
$row = mysqli_fetch_row($result);
?>
<form name="form1" method="post" action="clothUpdate_ok.php">
    <table border="0">
        <caption><h2>商品信息修改</h2></caption>
        <tr><td>商品名称：</td>
            <td><input type="text" name="name" value="<?php echo $row[1]?>"></td>
        </tr>
        <tr><td>价格/元：</td>
            <td><input type="text" name="price" value="<?php echo $row[2]?>"></td>
        </tr>

        <tr><td><input type="hidden" name="id" value="<?php echo $row[0]?>"></td>
            <td><input type="submit" name="submit" value="修改">
                <p><a href="clothModify.php">返回</a></p></td>
        </tr>
    </table>
</form>
</body>
</html>