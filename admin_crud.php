<?php
session_start();
$link = mysqli_connect("localhost", "root", "root123456") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");
mysqli_select_db($link, "group_12")or die ("cannot found database :( ") ;

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
include("addtoCart.php"); 
// var_dump($_SESSION['cart']);
include("check.php");
$categoryid= 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>管理員權限 | Little Things | Online Shopping Mall</title>
<link rel="icon" type="image/png" href="images/icon.png">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/component.css" rel='stylesheet' type='text/css' />
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
		<?php include("navbar.php");?>
	<!--/.navbar-collapse-->
	<?php
	$categoryid=0;?>
		<!-- content-section-starts -->
	<div class="container">
	   <div class="products-page">
       <div class="products">
				<div class="product-listy">
					<h2>管理員</h2>
					<ul class="product-list">
						<li><a href="datatable_member.php">會員資料管理</a></li>
						<li><a href="datatable_product.php">商品資料管理</a></li>
						<li><a href="datatable_contact.php">留言版管理</a></li>
						<li><a href="datatable_orders.php">訂單管理</a></li>
					</ul>
				</div>
				<div class="latest-bis">
					<img src="images/l4.jpg" class="img-responsive" alt="" />
					<div class="offer">
						<p>40%</p>
						<small>Top Offer</small>
					</div>
				</div> 	
				<div class="tags">
				    	<h4 class="tag_head">熱搜關鍵字</h4>
				         <ul class="tags_links">
							<li><a href="products.php?categoryid=-1">最新商品</a></li>
							<li><a href="#">今夏穿搭</a></li>
							<li><a href="#">大學穿搭</a></li>
							<li><a href="#">上衣</a></li>
							<li><a href="#">短版T</a></li>
							<li><a href="#">面試穿搭</a></li>
							<li><a href="#">人氣好物</a></li>
							<li><a href="#">古著</a></li>
							<li><a href="#">配件搭配</a></li>
							<li><a href="#">靴子</a></li>
							<li><a href="#">文青手錶</a></li>
							<li><a href="#">本周暢銷</a></li>
						</ul>
					
				</div>
</div>

			<div class="new-product">
				<div class="new-product-top">
					<ul class="product-top-list">
						<li><a href="index.php">Home</a>&nbsp;<span>&gt;</span></li>
						<li><span class="act">Best Sales</span>&nbsp;</li>
					</ul>
					<p class="back"><a href="index.php">Back to Previous</a></p>
					<div class="clearfix"></div>
				</div>
				<div class="mens-toolbar">
                 <div class="sort">
               	   <div class="sort-by">
					<div>
					<?php $search="";
						$searchword=""; ?>
					<form name="form1" id="form1" action="" method="POST">
					<input type="text" id="search" name="search" placeholder="請輸入關鍵字" value="<?php echo $search; ?>">
					<?php 
						if(isset($_POST['search'] )){
							$search = $_POST['search'];
						}?>
					<button type="submit" >搜尋商品</button>
					</form>
					</div>
					</div>
					<?php $search = " LIKE '%". $search ."%' " ;?>
				
	    		 </div>
		    	        <ul class="women_pagenation">
						<?php
							
							if($categoryid ==-10){
								$category= "" ;
							}if($categoryid ==-1){
								$category= " where new='new01' " ;
							}else if($categoryid ==-2){
								$category= " where new='new02' " ;
							}else if($categoryid ==-3){
								$category= " where sale='sale01' " ;
							}else if($categoryid ==-4){
								$category= " where sale='sale02' " ;
							}else if($categoryid ==-5){
								$category= " where where sale='pop' " ;
							}else if($categoryid ==0){
								$category= " where category='tshirt' or category='shirt' or category='coat' or category='sleeveless' " ;
							}else if($categoryid ==1){
								$category= " where category='tshirt' " ;
							}else if($categoryid ==2){
								$category= " where category='shirt' " ;
							}else if($categoryid ==3){
								$category= " where category='coat' " ;
							}else if($categoryid ==4){
								$category= " where category='sleeveless' " ;
							}else if($categoryid ==5){
								$category= " where category='pants' or category='shorts' or category='longskirt' or category='skirt' " ;
							}else if($categoryid ==6){
								$category= " where category='pants' " ;
							}else if($categoryid ==7){
								$category= " where category='shorts' " ;
							}else if($categoryid ==8){
								$category= " where category='longskirt' " ;
							}else if($categoryid ==9){
								$category= " where category='shoes' " ;
							}
							$sql = 	"SELECT * FROM product". $category ." and good_name" .$search." order by good_id" ;
							// echo $sql;
			    			$result = mysqli_query($link,$sql) or die("Error");
							$data_nums = mysqli_num_rows($result) ;	//總資料筆數
							$per = 9;
							$pages = ceil($data_nums / $per) ;	//總共會有幾頁
							if(!isset($_GET["page"])){
								$page = 1;
							}else {
								$page = intval($_GET["page"]) ; 
							}	
							$start = ($page-1) * $per; //每一頁的第一筆資料
							$result = mysqli_query($link,$sql .' limit '. $start.', '.$per);
							if(! $result){	//錯誤位置
								echo mysqli_error($link);
								exit();
							}

							//分頁頁碼
							echo "<p><b style=\"color:#694B4B; font-size: 17px; font-family: 微軟正黑體\" class=\"pagination pagination-sm\">共 $data_nums 筆-第 $page 頁-共 $pages 頁</b></p>";
       						echo "<ul class=\"pagination\">
        							<li><a href=?categoryid=".$categoryid."&page=1 aria-label=\"Previous\"><span aria-hidden=\"true\">«</span></a></li>";
      						for( $i=1 ; $i<=$pages ; $i++ ) {
               					echo "<li><a href=products.php?categoryid=".$categoryid."&page=".$i.">".$i."</a></li> ";
       						} 
       						echo " <li><a href=products.php?categoryid=".$categoryid."&page=".$pages." aria-label=\"Next\"><span aria-hidden=\"true\">»</span></a></li>
         					</ul>";
						?>		
			    </div>
			        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>
					
					<div class="clearfix"></div>
			<div>
					<ul>
			   <?php
				while ($row = mysqli_fetch_assoc($result)){ 					
		 echo'<li><div class="clearfix"></div>
						<a class="cbp-vm-image" href="single.php?good_id='.$row['good_id'].'">
						<div class="simpleCart_shelfItem">
							<div class="view view-first">
					   			<div class="inner_content clearfix">
										<div class="product_image">
				 								<img src="images/'.$row['img_name'].'.jpg" width=300px height=300px  />
							 			<div class="mask">
												<div class="info">瀏覽商品</div>
							 			</div>
							 			<div class="product_container">
												<div class="cart-left">
														<p class="title"> '.$row['good_name'].' </p> 
												</div>
										<div class="pricey">
												<span class="item_price"> $'.$row['price'].'	</span>
										</div>
										<div class="clearfix"></div>
										</div>
									</div>
							</div>
						</div>
						</a>
						<div class="cbp-vm-details"></div>
						<a class="cbp-vm-icon cbp-vm-add item_add" href="cart.php?good_id='.$row['good_id'].'">Add to cart</a>
					</div></li>
					
				';	
				}?>
				</ul>
				</div>
				<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="js/classie.js" type="text/javascript"></script>

			</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
   </div>
   <!-- content-section-ends -->
		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">人氣商品 全面暢銷中</h3>        			
				     <ul id="flexiselDemo3">
					 <?php 
			   			if ($result = mysqli_query($link, "SELECT * FROM product where sale= sale01 order by good_id ")){
						while ($row = mysqli_fetch_assoc($result)){
						
					echo'	<li><a href="single.php?good_id='.$row["good_id"].'"><img src="images/'.$row['img_name'].'.jpg" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.php?good_id='.$row["good_id"].'&price='.$row["price"].'>'.$row['good_name'].'</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$'.$row['price'].'</span></a></p>
							</div>
						</li>';
						}
					}
						?>
				     </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
				   </div>
				   </div>
	<?php include("footer.php"); ?>
</body>
</html>
<?php
mysqli_close($link); // 關閉資料庫連結
?>