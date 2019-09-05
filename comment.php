<?php
	$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
	or die("無法開啟MySQL資料庫連結!<br>");

	// 送出編碼的MySQL指令
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
	session_start();
	include("addtoCart.php");
    //資料庫新增存檔
    $msg="";
    $good_id= $_GET['good_id'];
	if (isset($_POST['username']))
	{
    	$sql = "insert into comment (good_id,username, email, score, content) 
				values ('$good_id','" . $_POST['username'] . "','" . $_POST['email'] . "','" . $_POST['score'] . "','" . $_POST['content'] . "')";

    	if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    	{
    	    $msg = "<span style='color:#0000FF'>評價新增成功！感謝您的回饋 <br><a href='single.php?good_id=$good_id'>返回商品頁面</a></span>";
    	}
    	else
    	{
    	    $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    	}
	}
	mysqli_close($link);
	include("check.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>商品評價 | Little Things | Online Shopping Mall</title>
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
	
<!-- contact-page -->
<div class="contact">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Comment
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php" title="Go to Home Page">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
               <div><?php echo $msg;?></div>
		<div class="contact-form">
			<div class="contact-info">
				<h3 style="color: #5C3131; font-family: 微軟正黑體">--↓商品評價↓--</h3>
                <p><center>您的評價，是我們進步的動力，也感謝您對我們商品的推薦與喜愛！</center></p>
			</div>
			<form method="POST">
				<div class="contact-left">
					<input type="text" id="username" name="username" placeholder="姓名" required>
					<input type="text" id="email" name="email" placeholder="E-mail" required>
					<input type="text" id="score" name="score" placeholder="請輸入1-10，10分為最愛" required>
				</div>
				<div class="contact-right">
					<textarea id="content" name="content" placeholder="商品回饋" required></textarea>
				</div>
				<div class="clearfix"></div>
				<input type="submit" value="SUBMIT" title="送出">
			</form>
		</div>
	</div>
</div>
	<?php include("footer.php"); ?>
</body>
</html>