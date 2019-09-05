<?php
session_start();
unset($_SESSION['cart']);
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = Array();
}else{
    $cnt = count($_SESSION['cart']);
}
//返回上一頁
$url = $_SERVER['HTTP_REFERER'];
header("Location:$url");

?>