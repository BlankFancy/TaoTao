<?php
require_once('./conn.php');

echo "<p>".$_COOKIE['u_name']."管理员，您好！<a href='homeOrignal.php?action=logout'>退出</a></p>";
if(isset($_GET['action'])&&$_GET['action']=='logout'){
    setcookie('u_name','',time()-1);
    header("Location:homeOrignal.php");
}

$page_title = '添加商品信息';
echo '<h1 id="mainhead">衣物类</h1>';
include ('./headerCloth.html');
echo "<hr>";

if (isset($_POST['Submit'])) {
    $errors = array();
    if (empty($_POST['name'])) {
        $errors[] = '您忘记输入商品名称.';
    }
    if (empty($_POST['price'])) {
        $errors[] = '您忘记输入商品价格.';
    }

    if (empty($errors)) {
        require_once('./conn.php');
        $sql = "SELECT cloth_id FROM cloth WHERE name='{$_POST['name']}'";
        $result = mysqli_query($dbc,$sql);
        if (mysqli_num_rows($result) == 0) {

            $sql = "INSERT INTO `cloth` ( `cloth_id` , `name` , `price`  ) 
					VALUES (NULL , '{$_POST['name']}',  '{$_POST['price']}');";
            mysqli_query($dbc," set  names utf8 " ) ;
            $result = @mysqli_query($dbc,$sql);

            if($result){

                echo '<b>添加成功！</b><a href=\'clothView.php\'>查看</a>';
                exit();
            }else{
                echo '<h1 id="mainhead">系统错误！</h1>
				<p class="error">很抱歉您暂时无法添加。<br />';
                echo '<p>' . mysqli_error() ;
                exit();
            }
        } else {
            echo '<h1 id="mainhead">错误！</h1>
			<p class="error">对不起，这件商品已存在，请重新添加。</p>';
        }
        mysql_close();
    } else {
        echo '<h1 id="mainhead">错误！</h1>
		<p class="error">出现以下错误：<br />';
        foreach ($errors as $msg) {
            echo " - $msg<br />\n";
        }
        echo '</p><p>请重填：</p><p><br /></p>';

    }
    echo '</div>';
}

?>

<h2>添加商品信息：</h2>
<form action="clothInsert.php" method="post">
    <table width="299" height="151">
        <tr>
            <td>商品名称: </td>
            <td><input type="text" name="name" size="20" maxlength="40" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" /></td>
        </tr>
        <tr>
            <td>价格/元:</td>
            <td><input type="text" name="price" size="20" maxlength="40" value="<?php if(isset($_POST['price'])) echo $_POST['price']; ?>" /></td>
        </tr>
        <tr>
            <td colspan="2"><div align="center">
                    <input type="submit" name="Submit" value="添加" />
                </div></td>
        </tr>
    </table>
</form>