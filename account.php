<?php
session_start();
include("addtoCart.php");
include("check.php");
if(@$_SESSION['level']>=2)
{
    header("Location:index.php");
}
//unset($_SESSION['level']);
//unset($_SESSION['username']);
?>
<!DOCTYPE html>
<html>
<head>
<title>登入 | Little Things | Online Shopping Mall</title>
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
<script>
	$s=0;
    $(document).ready(function($) {
        $("#form1").validate({
            submitHandler: function(form){
            	$s=1;
                form.submit();
            },
            rules: {
            	username: {
                    required: true
                },
                pwd: {
                    required: true
                }
            }
        });
    });
</script>
<style>
	.error {
	    color: red;
	    font-family: 微軟正黑體;
	    font-weight: normal;
	}
</style>
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
	<div class="content">
	<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 	<ul class="breadcrumbs">
                    	<li class="home">
                       		<a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       		<span>&gt;</span>
                    	</li>
                    	<li class="women">
                       		Login
                    	</li>
                	</ul>
                <ul class="previous">
                	<li><a href="index.php" title="Go to Home Page">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   	</div>
			   	<div class="account_grid">
			   	<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 	<h2>還沒加入會員嗎？</h2>
				 	<p>趕快加入會員並享有超多福利<br> 
					定期電子報通知您各種折扣優惠活動<br>  
					生日壽星享有好禮多重送</p>
				 	<a class="acount-btn" href="register.php">Create an Account</a>
			   	</div>
			   	<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			   		<h3 style="font-size: 23px; font-weight: bold; font-family: 微軟正黑體">登入</h3>
					<p>若您已經建立過帳號，請在此登入</p>
					<form id="form1" name="form1" method="POST" action="">
				  		<div>
							<span style="font-size: 15px; font-weight: bold; font-family: 微軟正黑體">帳&nbsp;號<label>&nbsp;&nbsp;*</label></span>
							<input type="text" id="username" name="username" required> 
				  		</div>
					  	<div>
							<span style="font-size: 15px; font-weight: bold; font-family: 微軟正黑體">密&nbsp;碼<label>&nbsp;&nbsp;*</label></span>
							<input type="password" id="pwd" name="pwd" required> 
					  	</div>
					  	<?php //if (!isset($_SESSION['username'])) echo "帳號密碼錯誤!<br>"; ?>
					  	<a class="forgot" href="forget.php">忘記密碼？</a>
					  	<input type="submit" value="Login">
			    	</form>
			   	</div>	
			   	<div class="clearfix"> </div>
			 	</div>
		   	</div>
		</div>
	</div>
	<?php include("footer.php"); ?>
</body>
</html>