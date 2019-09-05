<?php
session_start();
unset($_SESSION['cart']['good_id']); 

$_session_unregister['good_id'];
//返回上一頁
$url = $_SERVER['HTTP_REFERER'];
header("Location:$url");

?>