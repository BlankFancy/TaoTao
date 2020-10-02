<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>欢迎注册</title>
    <style type="text/css">
        table{
            padding-left:0px;
            width:800px;
            margin:0 auto;
            background:gainsboro;
            font-size:20px;
        }
        div{
            text-align:center;
        }
    </style>
</head>
<body>
    <form method="post" action="signIn2.php">
        <table border="0" cellpadding="5" >
            <tr>
                <td colspan="4"><div><h2><center>注册信息</center></h2></div></td>
            </tr>
            <tr>
                <td width="3"></td>
                <td width="250" align="right">用户名：</td>
                <td width="130" ><input name="USERS" type="text" value=""><font color="red" size="2"> * 4-8个数字或字母</font></td>
                <td width="50"></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">密码：</td>
                <td><input name="PASS1" type="password" value=""><font color="red" size="2"> * 必填</font></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">确认密码：</center></td>
                <td><input name="PASS2" type="password" value=""><font color="red" size="2"> * 必填</font></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">邮箱地址：</td>
                <td><input name="EMAIL" type="text" value=""><font color="red" size="2"> * 必填</font></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">收件地址：</td>
                <td><input name="ADDRESS" type="text" size="35" value="" ><font color="red" size="2"> * 必填</font></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">性别：</td>
                <td>
                    <input name="SEX" type="radio" value="0">男
                    <input name="SEX" type="radio" value="1">女
                    <input name="SEX" type="radio" value="2"  checked="checked">保密
                </td>
                <td></td>
            </tr>

            <tr>
                <td colspan="4" align="center">
                    <input type="submit" name="tj" value="提交">
                    <input type="reset" name="cz" value="重置">
                </td>
            </tr>
        </table>
        <center><a href="homeOrignal.php"><font size="2">返回首页</font></a></center>
    </form>
</body>
</html>
