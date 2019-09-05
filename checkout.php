<?php
session_start();
$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
// $good_id= $_GET['good_id'];
// $sql= "SELECT * FROM product where good_id='$good_id'";
include("addtoCart.php");  
// var_dump($_SESSION['cart']);
// count
include("check.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Little Things | Online Shopping Mall</title>
<link rel="icon" type="image/png" href="images/icon.png">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
</head>
<body>
	<!-- header-section-starts -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<?php
						if (@$_SESSION['level']==2)
						{
							echo '<ul>
								<li><a><b><i>會員&nbsp;'.$_SESSION['username'].'</i></b></a></li>
								<li><a href="member_update.php"><span class="glyphicon glyphicon-user"> </span>更改會員資料</a></li>
								<li><a href="logout.php"><span class="glyphicon glyphicon-user"> </span>登出</a></li>	
							</ul>';
						}
						else if (@$_SESSION['level']==9)
						{
							echo '<ul>
								<li><a href="admin_crud.php"><b><i>管理者&nbsp;'.$_SESSION['username'].'</i></b></a></li>
								<li><a href="logout.php"><span class="glyphicon glyphicon-user"> </span>登出</a></li>
							</ul>';
						}
						else
						{
							echo '<ul>
								<li><a href="admin.php"><span class="glyphicon glyphicon-user"> </span>管理者登入</a></li>
								<li><a href="account.php"><span class="glyphicon glyphicon-user"> </span>登入會員</a></li>
								<li><a href="register.php"><span class="glyphicon glyphicon-lock"> </span>加入會員</a></li>
							</ul>';
						}
					?>
				</div>
				<div class="header-right">
				<div class="cart box_1">
							<a href="checkout.php">
								<h3> <span>我的購物車 ( <?php echo $cnt ?></span>)<img src="images/bag.png" alt=""></h3>
							</a>	
							<p><a href="cart_delete.php">清空購物車</a></p>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
	<?php include("navbar.php"); ?>
		<!-- checkout -->
<div class="cart-items">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Cart
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			<!-- 標題 顯示有幾項商品 -->
			 <h2>我的購物車 ( <?php echo $cnt; ?> 項商品 )</h2>	
		<div class="cart-gd">
		<?php
		$cart_total=0;
		for($i=0; $i<$cnt; $i++){
			$good_id = $_SESSION['cart'][$i] ;
			
			$sql= "SELECT * FROM product where good_id='$good_id'";
			if ($result = mysqli_query($link, $sql)) {
				while($row = mysqli_fetch_assoc($result)) {
			?>
			
			<!-- 顯示購物車商品 -->
			 <div class="cart-header">
				 <div class="close1">
				 	<?php echo'<a href="cart_delete_single.php?good_id='.$row['good_id'].'">';?>
					 <img src="images/close_1.png"></a>
				 </div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="images/<?php echo $row["img_name"];?>.jpg" class="img-responsive" alt="">
						</div>
					   <div class="cart-item-info">
						<h3><?php echo'<a href="single.php?good_id='.$good_id.'">';?><?php echo $row["good_name"];?></a></h3>
						<ul class="qty">
							<li><p>尺寸：  F </p></li>
						</ul>
							 <div class="delivery">
							 <!-- 確認是否有現貨 -->
							 <p><?php 
								 if($row["numbers"] > 1)
									 echo "目前有貨，今天訂明天到";
								 else echo "此商品需要調貨，約3-5天時間"; ?></p>
							 <span>
							 售價： $<?php echo $row["price"]; ?>
							 		<?php $cart_total += $row['price'] ; ?>
							 </span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>					
				  </div>
			 </div>
		<?php
				}
		 	} 
		}
		?>
		<hr>
		<div class="floatr">
		
		訂單總額： $<?php echo $cart_total;?><br>

		<?php 
		$y = 1500 -$cart_total ;
		if($cart_total>=500 && $cart_total<1500){
			echo '消費金額已達免運費門檻，再消費' .$y. '元，隨出貨附贈限量帆布袋。';
		}else if($cart_total <500){
			echo '消費金額未達免運門檻，需負擔運費 $60元。';
		}else{
			echo '消費已滿 $1500，隨出貨附贈限量帆布袋。';
		}?>
		<br>
		<?php
						if (@$_SESSION['level']==2)
						{
							echo '<h3><a href="orders.php">結帳去</a></h3>';
						}
						else if (@$_SESSION['level']==9)
						{
							echo '<h3><a href="orders.php">結帳去</a></h3>';
						}
						else
						{
							echo '<h3><a href="account.php">結帳去</a></h3>';
							echo '* 若您尚未登入會員，請先登入會員再結帳。';
						}
					?>
		</div>
		</div>
	</div>

</div>
	<?php include("footer.php") ; ?>
</body>
</html>

<?php
mysqli_close($link); // 關閉資料庫連結
?>