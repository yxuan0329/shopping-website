<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = Array();
}else{
    $cnt = count($_SESSION['cart']);
}
session_start(); 
$good_id = $_GET['good_id'];//商品ID
$price = $_GET['price']; //價格
$cart_total += $price;


//若商品未在購物車中,則加入購物車(陣列)
if (!in_array($good_id,$_SESSION['cart'])){
   $_SESSION['cart'][]=$good_id;//加入陣列
   $cart_total += $price;
}
//返回上一頁
$url = $_SERVER['HTTP_REFERER'];
header("Location:$url");

?>