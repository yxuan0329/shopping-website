<?php
$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

if (isset($_POST['pwd']))
	{
    	$sql = "UPDATE member SET password = '".$_POST['pwd']."' where username = '".$_POST['username']."'";

    	if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    	{
    	    header("Location:account.php");
    	}
	}
	mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
<title>更改密碼 ｜ Little Things | Online Shopping Mall</title>
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
    $(document).ready(function($) {
        $("#form1").validate({
            submitHandler: function(form){
                form.submit();
            },
            rules: {
            	username: {
            		required: true
            	},
                pwd: {
                    required: true,
                    minlength: 6,
                    maxlength: 12
                },
                pwd2: {
                    required: true,
                    equalTo: "#pwd"
                }
            },
            messages: {
                pwd: {
                    minlength: "請輸入欄位不小於6的字串",
                    maxlength: "密碼最長12個字"
                },
                pwd2: {
                    equalTo: "兩次密碼不相符"
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
					<ul>
						<li><a href="admin.php"><span class="glyphicon glyphicon-user"> </span>管理者登入</a></li>
						<li><a href="account.php"><span class="glyphicon glyphicon-user"> </span>登入會員</a></li>
						<li><a href="register.php"><span class="glyphicon glyphicon-lock"> </span>加入會員</a></li>			
					</ul>
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
		<!-- registration-form -->
<div class="registration-form">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Registration
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php" title="Go to Home Page">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			   	<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 	<h2>忘記密碼怎麼辦？</h2>
				 	<p>步驟1：輸入帳號以及您的信箱與手機號碼以確認是否為本人<br>
					<b style="color: #969393">步驟2：確認為本人後，可修改您的密碼</b><br>
					步驟3：修改完成後，即可使用您設定的新密碼進行登入</p>
			   	</div>
			   	<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			   		<h3 style="font-size: 23px; font-weight: bold; font-family: 微軟正黑體">修改密碼</h3>
					<p>請您修改密碼，修改過後即可使用新密碼進行登入</p>
					<form id="form1" name="form1" method="POST" action="">
						<div>
							<span style="font-size: 15px; font-weight: bold; font-family: 微軟正黑體">帳&nbsp;號<label>&nbsp;&nbsp;*</label></span>
							<input type="text" id="username" name="username" required> 
				  		</div>
				  		<div>
							<span style="font-size: 15px; font-weight: bold; font-family: 微軟正黑體">新&nbsp;密<label>&nbsp;碼&nbsp;*</label></span>
							<input type="password" id="pwd" name="pwd" placeholder="請輸入6-12位數，英文、數字混合" required minlength="6" maxlength="12"> 
				  		</div>
					  	<div>
							<span style="font-size: 15px; font-weight: bold; font-family: 微軟正黑體">確認密碼<label>&nbsp;&nbsp;*</label></span>
							<input type="password" id="pwd2" name="pwd2" required minlength="6" maxlength="12"> 
					  	</div>
					  	<input type="submit" value="Submit">
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