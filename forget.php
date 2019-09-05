<?php
$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

if ($result = mysqli_query($link, "SELECT * FROM member")) {
    while ($row = mysqli_fetch_assoc($result)) {
        if(@$_POST['username'] != null && @$_POST['email'] != null && @$_POST['mobile'] != null)
        {
        	if(@$_POST['username'] == $row["username"] && @$_POST['email'] == $row["email"] && @$_POST['mobile'] == $row["mobile"])
	        {
	            header("Location:account_update.php");
	        }
	        else
	        {
	        	$msg = "<span style='color:#FF0000'>驗證失敗！";
	        }
        }
        
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
?>
<!DOCTYPE html>
<html>
<head>
<title>忘記密碼 | Little Things | Online Shopping Mall</title>
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
								<h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)<img src="images/bag.png" alt=""></h3>
							</a>	
							<p><a href="javascript:;" class="simpleCart_empty">清空購物車</a></p>
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
				 	<p><b style="color: #969393">步驟1：輸入帳號以及您的信箱與手機號碼以確認是否為本人</b><br>
					步驟2：確認為本人後，可修改您的密碼<br>
					步驟3：修改完成後，即可使用您設定的新密碼進行登入</p>
			   	</div>
			   	<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			   		<h3 style="font-size: 23px; font-weight: bold; font-family: 微軟正黑體">驗證信箱與手機號碼</h3>
					<p>若您忘記密碼，請務必經過此驗證步驟</p>
					<form id="form1" name="form1" method="POST" action="">
				  		<div>
							<span style="font-size: 15px; font-weight: bold; font-family: 微軟正黑體">帳&nbsp;號<label>&nbsp;&nbsp;*</label></span>
							<input type="text" id="username" name="username" required> 
				  		</div>
				  		<div>
							<span style="font-size: 15px; font-weight: bold; font-family: 微軟正黑體">信&nbsp;箱<label>&nbsp;&nbsp;*</label></span>
							<input type="text" id="email" name="email" required> 
				  		</div>
					  	<div>
							<span style="font-size: 15px; font-weight: bold; font-family: 微軟正黑體">手機號碼<label>&nbsp;&nbsp;*</label></span>
							<input type="text" id="mobile" name="mobile" required> 
					  	</div>
					  	<input type="submit" value="Verify"><?=@$msg?>
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