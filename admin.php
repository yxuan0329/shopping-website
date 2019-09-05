<?php
	$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
	or die("無法開啟MySQL資料庫連結!<br>");

	// 送出編碼的MySQL指令
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
	session_start();
	include("addtoCart.php");

	if ($_SESSION["level"] != 9) {
		header("Location:account.php?url=admin.php");
	}
	include("check.php");
?>