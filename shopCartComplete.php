<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的购物车</title>
    <style type="text/css">
        .STYLE1{font-size:20px;color:dodgerblue;}
        .STYLE2{table,td{
                    border:0px solid #8a8c8e;
                    border-collapse:collapse;
                    line-height:2em;
                    text-align:left;
                    font-size:14px;
                }}
    </style>
</head>
<body>
<?php
//随机生成图片
$letter = array('1','2','3','4','5','6','7','8');
$length = 1;
$arrlength = count($letter);
$string = '';
for($i=0;$i<$length;$i++){
    $string.=$letter[rand(0,$arrlength-1)];
}
$p = '';
$p1 = '';
$p2 = '';
for($i=0;$i<strlen($string);$i++){
    $digt = substr($string,$i,1);
    $p .="<img src=\"img/g{$digt}.jpg\">";
    $p1 .="<img src=\"img/j{$digt}.jpg\">";
    $p2 .="<img src=\"img/y{$digt}.jpg\">";
}


    echo "<center><font size='30'><B>您选购的商品如下</B></font></center>";
//未购买东西生成的页面
if(!isset($_COOKIE['gwc'])&&!isset($_COOKIE['gwc1'])&&!isset($_COOKIE['gwc2'])){
    echo "<table border='0' width='550' align='center'>";
    echo"<tr><td class='STYLE1' colspan='3'><center>您还没有购买任何东西哦！</center></td></tr>";
    echo"<tr>";
        echo "<td><center><a href=\"cake.php\">选购美味糕点</a></center></td>";
        echo "<td><center><a href=\"nut.php\">选购坚果食品</a></center></td>";
        echo "<td><center><a href=\"clothesComplete.php\">选购服装服饰</a></center></td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td><center><a href=\"cake.php\">$p</a></center></td>";
        echo "<td><center><a href=\"nut.php\">$p1</a></center></td>";
        echo "<td><center><a href=\"clothesComplete.php\">$p2</a></center></td>";
    echo "</tr>";
    echo "</table>";
}



//糕点
echo "<table border='1' width='500' align='center'>";
if(isset($_COOKIE['gwc'])){
    $arr = array("","雪麸蛋糕","天然酵母面包","黄油曲奇","绿茶蛋黄酥"
    ,"法式松饼","茶香酥","苏打夹心饼","姜汁薄脆");
    echo "<tr>";
        echo "<td class='STYLE1' colspan='2'><center><B>您挑选的糕点</B></center></td>";
        echo "<td><a href=\"cake.php\"><center>返回糕点窗口</center></a></td>";
    echo "</tr>";
    $value = explode(",",$_COOKIE['gwc']);
    foreach($value as $str){
        echo "<tr>";
        echo "<td><center>$arr[$str]</center></td>";
        echo "<td><center><img src=\"img/g{$str}.png\"></center></td>";
    }
    echo "</tr>";
    echo "<tr><td colspan='3'><p align='center'>您一共选购了".count($value)."件糕点</p></td></tr>";
}




//坚果
if(isset($_COOKIE['gwc1'])){
    $arr1 = array("","碧根果仁","原香味巴旦木","盐焗腰果","原味葵花籽"
    ,"麻辣花生","蚕豆瓣","混合果仁","瓜子仁");
    echo "<tr>";
        echo "<td class='STYLE1' colspan='2'><center><B>您挑选的坚果</B></center></td>";
        echo "<td><a href=\"nut.php\"><center>返回坚果窗口</center></a></td>";
    echo "</tr>";
    $value1 = explode(",",$_COOKIE['gwc1']);
    foreach($value1 as $str1){
        echo "<tr>";
        echo "<td><center>$arr1[$str1]</center></td>";
        echo "<td><center><img src=\"img/j{$str1}.png\"></center></td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='3'><p align='center'>您一共选购了".count($value1)."件坚果</p></td></tr>";
}




//服装
if(isset($_COOKIE['gwc2'])){
    $arr2 = array("","男式简约毛呢大衣","男式经典毛呢大衣","男式防风工装外套","男式潮流侧带装饰卫衣"
    ,"女式金丝撒粉花呢","女式真皮基础夹克","女式拼接西装套裙","女式长款羽绒服");
    echo "<tr>";
        echo "<td class='STYLE1' colspan='2'><center><B>您挑选的服饰</B></center></td>";
        echo "<td><a href=\"clothesComplete.php\"><center>返回服饰窗口</center></a></td>";
    echo "</tr>";
    $value2 = explode(",",$_COOKIE['gwc2']);
    foreach($value2 as $str2){
        echo "<tr>";
        echo "<td><center>$arr2[$str2]</center></td>";
        echo "<td><center><img src=\"img/y{$str2}.png\"></center></td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='3'><p align='center'>您一共选购了".count($value2)."件服饰</p></td></tr>";
}
echo "</table>";
//$sum =  count($value)+count($value1)+count($value2);
//echo "<p align='center'>你一共选购了".$sum."件商品</p>";