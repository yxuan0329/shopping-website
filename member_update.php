<?php
$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");
session_start();
// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

if (isset($_POST['first']))
	{
    	$sql = "UPDATE member SET first_name = '".$_POST['first']."', last_name = '".$_POST['last']."', birthday = '".$_POST['birthday']."', email = '".$_POST['email']."', password = '".$_POST['pwd']."', mobile = '".$_POST['mobile']."' where username = '".$_SESSION['username']."'";
    	if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    	{
    	    @$msg = "<span style='color:#0000FF'>修改成功！</span>";
    	}
    	else 
    	{
    	    @$msg = "<span style='color:#FF0000'></span>";
    	}
	}
	mysqli_close($link);
	include("addtoCart.php");
	include("check.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>更改會員資料 ｜ Little Things | Online Shopping Mall</title>
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
            	first: {
            		required: true
            	},
            	last: {
            		required: true
            	},
            	birthday: {
            		required: true
            	},
            	email: {
                    required: true,
                    email: true
                },
                pwd: {
                    required: true,
                    minlength: 6,
                    maxlength: 12
                },
                pwd2: {
                    required: true,
                    equalTo: "#pwd"
                },
                phone: {
                	required: true
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
                       Update for Member's Information
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php" title="Go to Home Page">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <h2>更改會員資料</h2>
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
					 <p>親愛的會員您好，若您想要更改您的基本資料，請在此修改，謝謝您的配合！</p>
					 <p><?=@$msg?></p>
					 <form role="form" id="form1" name="form1" method="POST">
					 	 <ul>
							 <li class="text-info" style="font-family: 微軟正黑體">帳&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;號： </li>
							 <li style="font-family: 微軟正黑體"><?php echo ''.$_SESSION['username'].''; ?></li>
						 </ul>
						 <ul>
							 <li class="text-info" style="font-family: 微軟正黑體">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;氏： </li>
							 <li><input type="text" value="" id="first" name="first" required></li>
						 </ul>
						 <ul>
							 <li class="text-info" style="font-family: 微軟正黑體">名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;字： </li>
							 <li><input type="text" value="" id="last" name="last" required></li>
						 </ul>
						 <ul>
							 <li class="text-info" style="font-family: 微軟正黑體">生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日： </li>
							 <li><input type="text" value="" id="birthday" name="birthday" placeholder="例如:1999-01-01" required></li>
						 </ul>
						 <ul>
							 <li class="text-info">E-MAIL : </li>
							 <li><input type="text" value="" id="email" name="email" required onkeyup="sendRequest();">
							 	 <br><span id='show_msg' style="color:red; font-family: 微軟正黑體"></span></li>
						 </ul>
						 <ul>
							 <li class="text-info" style="font-family: 微軟正黑體">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碼： </li>
							 <li><input type="password" value="" id="pwd" name="pwd" placeholder="請輸入6-12位數，英文、數字混合" required minlength="6" maxlength="12"></li>
						 </ul>
						 <ul>
							 <li class="text-info" style="font-family: 微軟正黑體">確認密碼：</li>
							 <li><input type="password" value="" id="pwd2" name="pwd2" placeholder="" required minlength="6" maxlength="12"></li>
						 </ul>
						 <ul>
							 <li class="text-info" style="font-family: 微軟正黑體">手機號碼：</li>
							 <li><input type="text" value="" id="mobile" name="mobile" required></li>
						 </ul>						
						 <input type="submit" value="Submit">
						 
					 </form>
				 </div>
			</div>
			<div class="reg-right">
				 <h3>會員享有多重優惠</h3>
				 <div class="strip"></div>
				 <p>【貼心小提醒】我們不會以任何原因，請求操作ATM轉帳匯款，或於下班時段通知帳務異常，
				 	若有疑慮請洽 客服02-29959996 或反詐騙165專線 諮詢查證，謝謝</p>
				 <h3 class="lorem">會員福利</h3>
				 <div class="strip"></div>
				 <p>- 分級制度，消費越多，福利越多</p>
				 <p>- 生日壽星好禮</p>
				 <p>- 定期電子報，好康不錯過</p>
				 <p>- 每月10號會員日，消費再享88折</p>
			</div>
			   	<div class="clearfix"> </div>
			 	</div>
		   	</div>
		</div>
	</div>
	<?php include("footer.php"); ?>
</body>
</html>