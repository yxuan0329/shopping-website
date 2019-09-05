<?php
session_start();
$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
include("addtoCart.php"); 
include("check.php");
// var_dump($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
<title>首頁 | Little Things | Online Shopping Mall</title>
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
	<!--/.navbar-header-->

	<div class="banner">
		<div class="container">
<div class="banner-bottom">
	<div class="banner-bottom-left">
		<h2>Enjoy<br>Life</h2>
	</div>
	<div class="banner-bottom-right">
		<div  class="callbacks_container">
					<ul class="rslides" id="slider4">
					<li>
								<div class="banner-info">
									<h3>說逛就逛</h3>
									<p>來一場與自己的小旅行</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								   <h3>期間限定</h3>
									<p>單筆消費滿1,500，贈送獨家帆布袋</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								  <h3>夏日周年慶</h3>
									<p>16 May - 21 May</p>
								</div>								
							</li>
						</ul>
					</div>
					<!--banner-->
	  			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
	</div>
	<div class="clearfix"> </div>
</div>
	<div class="shop">
	<a href="products.php?categoryid=-1">快來尋找你的小確幸吧！</a>
	</div>
	</div>
		</div>
		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
				<div class="online-strip">
					<div class="col-md-4 follow-us">
						<h3>追蹤我們 : <a class="twitter" href="www.twitter.com"></a><a class="facebook" href="www.facebook.com"></a></h3>
					</div>
					<div class="col-md-4 shipping-grid">
						<div class="shipping">
							<img src="images/shipping.png" alt="" />
						</div>
						<div class="shipping-text">
							<h3>全館促銷</h3>
							<p>滿 $500 即享免運</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 online-order">
						<p>客服專線</p>
						<h3>Tel:04-7232105</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div><img src="images/s3.jpg" alt="" width="1200" /></div>
				<div class="products-grid">
				<header>
					<h3 class="head text-center">最新上市商品</h3>
				</header>
				<?php 
			   if ($result = mysqli_query($link, "SELECT * FROM product where new ='new01' ")){
				while ($row = mysqli_fetch_assoc($result)){
					echo '<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.php?good_id='.$row['good_id'].'"><img src="images/'.$row['img_name'].'.jpg" alt="" /></a>
						<div class="mask">
							<a href="single.php?good_id='.$row['good_id'].'">Quick View</a>
						</div>
						<a class="product_name" href="single.php?good_id='.$row['good_id'].'">'.$row['good_name'].'</a>
						<p><a class="item_add" href="cart.php?good_id='.$row['good_id'].'"><i></i> <span class="item_price">'.$row['price'].'</span></a></p>
					</div>'; 
					}
				}?>

					<div class="clearfix"></div>
				</div>
			</div>
		
		</div>
		<?php include("footer.php") ;?>
</body>
</html>
<?php
mysqli_close($link); // 關閉資料庫連結
?>