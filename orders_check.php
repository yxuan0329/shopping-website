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
<title>確認訂單 | Little Things | Online Shopping Mall</title>
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
    <script>
        $(document).ready(function($){
            $("#form1").validate({
                submitHandler: function(form) {
                    form.submit();
                },
                rules: {
                    name: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    address: {
                        required: false
                    },
                }
            });
        });
    </script>

<!--webfont-->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
</head>
    <style type="text/css">
    .error {
        color: red;
        font-weight: normal;
    }
	table{
		margin:0 auto;
	}
    </style>

<?php
$type = (isset($_POST['type'])) ? $_POST['type'] : "";
$arr_type = array_fill(1, 3, '');
$arr_type[$type] = "checked";
$arr_typename = array(1 => "購物金$50", "精美髮飾", "簡約耳環");

$name = (isset($_POST['name'])) ? $_POST['name'] : "";
$phone= (isset($_POST['phone'])) ? $_POST['phone'] : "";
$address= (isset($_POST['address'])) ? $_POST['address'] : "";
$notes = (isset($_POST['notes'])) ? $_POST['notes'] : "";
?>

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
                                <li><a><b><i>管理者&nbsp;'.$_SESSION['username'].'</i></b></a></li>
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
			 <h2>交易成功 Success !!</h2>
             <p><center>我們已將詳細購物資訊寄到信箱，請多留意新郵件。</center></p>
             <p><center><a href="index.php">回首頁，繼續享受小確幸</a></center></p>	
             <?php unset($_SESSION['cart']);?>
    </div>


    <?php include("footer.php"); ?>
</body>
</html>

<?php
mysqli_close($link); // 關閉資料庫連結
?>