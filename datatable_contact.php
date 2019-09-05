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
<title>訂單管理 | Little Things | Online Shopping Mall</title>
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

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="datatable_contact.js"></script>
<style>
body {
    font-family: "微軟正黑體";
}

.error {
    color: #D82424;
    font-weight: normal;
    display: inline;
    padding: 1px;
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
                                <li><a href="admin_crud.php"><span class="glyphicon glyphicon-user"> </span>管理者登入</a></li>
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
                       Admin
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="admin_crud.php">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
	</div>

    <div class="row">
        <div class="col-md-2"></div>

            <form class="form-horizontal form-inline" name="form1" id="form1" method="post">
                <input type="hidden" name="oper" id="oper" value="insert">
                <input type="hidden" name="mid_old" id="mid_old" value="">
                <table id="edit" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">留言編號</th>
                            <th class="text-center">姓名</th>
                            <th class="text-center">信箱</th>
                            <th class="text-center">主旨</th>
                            <th class="text-center">內容</th>
                            <th class="text-center">存檔/取消</th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <input type="text" id="contact_id" name="contact_id" style="width:80px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="name" name="name" style="width:100px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="email" name="email" style="width:100px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="subject" name="subject" style="width:100px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="message" name="message"style="width:80px">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-xs" id="btn-save"><i class="glyphicon glyphicon-save"></i>存檔</button>
                                <button type="reset" class="btn btn-danger btn-xs" id="btn-cancel">取消</button>
                            </td>
                        </tr>
                    </thead>
                </table>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                            <th class="text-center">留言編號</th>
                            <th class="text-center">姓名</th>
                            <th class="text-center">信箱</th>
                            <th class="text-center">主旨</th>
                            <th class="text-center">內容</th>
                            <th class="text-center">存檔/取消</th>
                        </tr>
                    </thead>
                </table>
        </div>
        <div class="col-md-2"></div>

    </div>


<?php include("footer.php") ; ?>
</body>
</html>

<?php
mysqli_close($link); // 關閉資料庫連結
?>