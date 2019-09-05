<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$good_id= $_GET['good_id'];
$sql= "SELECT * FROM product where good_id='$good_id'";
session_start();
include("addtoCart.php"); 
include("check.php");
// var_dump($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
<title>商品介紹 | Little Things | Online Shopping Mall</title>
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
		<!-- content-section-starts -->
	<div class="container">
	   <div class="products-page">
		 <?php include("navleft.php"); ?>

<?php
// 送出查詢的SQL指令
if ($result = mysqli_query($link, $sql)) {
	while($row = mysqli_fetch_assoc($result)) { 
	 $picture = $row['img_name'] ;
?>
			<div class="new-product">
				<div class="col-md-5 zoom-grid">
					<div class="flexslider">
						<ul class="slides">
							<?php echo'<li data-thumb="images/'.$picture.'.jpg ">';?>
								<div class="thumb-image">
								<?php echo '<img src="images/'.$picture.'.jpg" data-imagezoom="true" class="img-responsive" alt="" />';?> </div>
							</li>
							<?php echo'<li data-thumb="images/'.$picture.'_6.jpg ">';?>
								<div class="thumb-image">
								<?php echo '<img src="images/'.$picture.'_6.jpg" data-imagezoom="true" class="img-responsive" alt="" />';?> </div>
							</li>
							<?php echo'<li data-thumb="images/'.$picture.'_7.jpg ">';?>
								<div class="thumb-image">
								<?php echo '<img src="images/'.$picture.'_7.jpg" data-imagezoom="true" class="img-responsive" alt="" />';?> </div>
							</li>
 
						</ul>
					</div>
				</div>
				<div class="col-md-7 dress-info">
					<div class="dress-name">
						<h3><?php echo $row["good_name"]; ?></h3>
						<span>$<?php echo $row["price"]; ?></span>
						<div class="clearfix"></div>
						<p><?php echo nl2br($row["description"]); ?></p>
					</div>
					<div class="span span1">
						<p class="left">材質：</p>
						<p class="right"><?php echo $row["material"]; ?></p>
						<div class="clearfix"></div>
					</div>
					<div class="span span2">
						<p class="left">製造產地：</p>
						<p class="right"><?php echo $row["madein"]; ?></p>
						<div class="clearfix"></div>
					</div>
					<div class="span span3">
						<p class="left">SIZE：</p>
						<p class="right"><span class="selection-box"><select class="domains valid" name="domains">
										   <option>F</option>
									   </select></span></p>
						<div class="clearfix"></div>
					</div>
					<div class="purchase">
						<?php echo'<a href="cart.php?good_id='.$row['good_id'].'">';?>Purchase Now</a>
						<div class="social-icons">
							<ul>
								<li><a class="facebook1" href="https://www.facebook.com/"></a></li>
								<li><a class="twitter1" href="https://twitter.com/"></a></li>
								<li><a class="googleplus1" href="https://www.google.com.tw/webhp?tab=rw"></a></li>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				<script src="js/imagezoom.js"></script>
					<!-- FlexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
					</script>
				</div>
				<div class="clearfix"></div>
					<div class="reviews-tabs">
      <!-- Main component for a primary marketing message or call to action -->
      <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
        <li class="test-class active"><a class="deco-none misc-class" href="#how-to">商品特色</a></li>
        <li class="test-class"><a href="#features">更多穿搭</a></li>
        <li class="test-class"><a class="deco-none" href="#source">商品評價</a></li>
      </ul>

      <div class="tab-content responsive hidden-xs hidden-sm">
        <div class="tab-pane active" id="how-to">
		 <p class="tab-text">
		 <table width="800" border=1px>
						<caption>商品尺寸表/ SIZE CHART</caption>
						商品編號 /<?php echo $row["good_id"]; ?> <br>
						商品名稱 /<?php echo $row["good_name"]; ?>
            <tbody>

                <tr>
                    <td>尺碼</td>
                    <td>衣長</td>
										<td>肩寬</td>
										<td>袖長</td>
										<td>手臂寬</td>
										<td>下擺寬</td>
										<td>下擺寬</td>
                </tr>
                <tr>
                    <td><?php echo $row["chart_1"]; ?></td>
                    <td><?php echo $row["chart_2"]; ?></td>
                    <td><?php echo $row["chart_3"]; ?></td>
										<td><?php echo $row["chart_4"]; ?></td>
										<td><?php echo $row["chart_5"]; ?></td>
										<td><?php echo $row["chart_6"]; ?></td>
										<td><?php echo $row["chart_7"]; ?></td>
                </tr>
                <tr>
                    <td>其他</td>
                    <td colspan="6"><?php echo $row["chart_8"]; ?></td>
                </tr>
                <tr>
                    <td colspan="7">小提醒：<br>
																		‧ 任何衣物都建議深淺色分開洗滌。<br>
																		‧ 首次洗滌時深色布料易釋於出多餘固色劑，屬於正常現象。<br>
																		‧ 保持衣物色澤鮮艷避免色澤移染，勿長時間浸泡。<br>
																		‧ 使用洗衣機洗滌時，請以低速短程洗滌。<br>
																		‧ 洗衣機脫水後請立即晾衣，勿放置過久以防移染。</td>
                </tr>
            </tbody>
		 </table>
		 </p>    
        </div>
        <div class="tab-pane" id="features">
          <p class="tab-text">	  
					<?php echo '<img src="images/'.$picture.'_2.jpg" data-imagezoom="true" class="img-responsive" alt="" />';?>
		      <?php echo '<img src="images/'.$picture.'_3.jpg" data-imagezoom="true" class="img-responsive" alt="" />';?>
		      <?php echo '<img src="images/'.$picture.'_4.jpg" data-imagezoom="true" class="img-responsive" alt="" />';?>
		      <?php echo '<img src="images/'.$picture.'_5.jpg" data-imagezoom="true" class="img-responsive" alt="" />';?></p>
		</div>
      <div class="tab-pane" id="source">
		  <div class="response">
			<?php echo '<a href="comment.php?good_id='.$row['good_id'].'">';?>我要評價</a>
			<?php
					$sql= "SELECT * FROM comment where good_id='$good_id'";
					if ($result = mysqli_query($link, $sql)) {
						while($row = mysqli_fetch_assoc($result)) { 
				?>
					<div class="media response-info">
							<div class="media-left response-text-left">
								<a href="#">
									<img class="media-object" src="images/icon1.png" alt="" />
								</a>
								<h5><a><?php echo $row["username"];?></a></h5>
							</div>
							<div class="media-body response-text-right">
								<p><?php echo $row["score"];?> 分</p>
								<ul>
								<li><?php echo $row["content"]; ?></li>
								</ul>		
							</div>
						
							<div class="clearfix"> </div>
					</div>
					<?php } mysqli_free_result($result);  }?>
					</div>
        </div>
      </div>		
	</div>

	<div>
	  <?php echo '<img src="images/'.$picture.'_6.jpg" data-imagezoom="true" class="img-responsive" alt="" />';?>
		<?php echo '<img src="images/'.$picture.'_7.jpg" data-imagezoom="true" class="img-responsive" alt="" />';?>
	</div>

			</div>
			<div class="clearfix"></div>
			</div>
   </div>
		<?php include("footer.php"); ?>		
 <script src="js/responsive-tabs.js"></script>
    <script type="text/javascript">
      $( '#myTab a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      $( '#moreTabs a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>

</body>
</html>
<?php
	 }
	 mysqli_close($link); // 關閉資料庫連結
		 }
?>