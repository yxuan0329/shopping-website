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

// var_dump($_SESSION['cart']);// count
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    
    <!--中文錯誤訊息-->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
    <script>
    $(document).ready(function($) {
        $("#form1").validate({
            submitHandler: function(form){
                form.submit();
            },
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
                type: {
                    required: true
                },
                type2: {
                    required: true
                },
                address: {
                    required: true
                }
            }
        });
    });
</script>
   <script>
        $(document).ready(function($){
            submitHandler: function(form) { //顯示成功訊息
                alert("success!");
                form.submit();
            },
            $("#form1").validate({
                submitHandler: function(form) {
                    form.submit();
                },
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    type2: {
                        required: true
                    },
                    address: {
                        required: true
                    }
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
$type2 = "checked";
$arr_typename = array(1 => "購物金$50", "精美髮飾", "簡約耳環");

$name = (isset($_POST['name'])) ? $_POST['name'] : "";
$email = (isset($_POST['email'])) ? $_POST['email'] : "";
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
							<p><a href="">清空購物車</a></p>
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
                       Order
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			<!-- 標題 顯示有幾項商品 -->
			 <h2>我的訂單 My Orders</h2>
             <p><center>只要最後一步，填妥寄送資訊，最快明天就可以取貨囉！</center></p>	
		<div class="cart-gd">
        <!-- 從cart顯示訂單商品 -->
        
        <table width="700" height="30" border="1">
            <tr>
               <td>商品編號</td>
               <td>商品名稱</td>
               <td>尺寸</td>
               <td>單計</td>
               <td>數量</td>
               <td>小計</td>
            </tr>
		<?php
        $cart_total=0;
        $fee=0; // 運費 如果<500元的話酌收60元
		for($i=0; $i<$cnt; $i++){
			$good_id = $_SESSION['cart'][$i] ;
			
			$sql= "SELECT * FROM product where good_id='$good_id'";
			if ($result = mysqli_query($link, $sql)) {
				while($row = mysqli_fetch_assoc($result)) {
			?>
        <?php // 把消費者的購物車存到cart 由cart紀錄商品細項 再轉orders 只記錄總商品數量與金額
            $good_name =$row["good_name"];
            $price =$row["price"];
			$sql_insertcart = "INSERT INTO cart(`username`, `good_id`,`good_name`, `number`, `price`) VALUES ('".$_SESSION['username']."','" . $good_id . "','" . $good_name . "',1,'" . $price . "')";
			$result2 = mysqli_query($link, $sql_insertcart);?>
            
        <tr>
           <td><?php echo $good_id;?></td>
           <td><?php echo $good_name;?></a></td>
           <td>F</td>
           <td><?php echo $price;?></td>
           <td>1<?php $nprices=$price*1; ?></td>
           <td><?php echo $nprices;?></td>
        </tr>
                        
        <?php
                }
            }
            $cart_total += $nprices; 
        } ?>
        <?php if($cart_total<500){
               $fee=60;
               echo '
            <tr>
               <td></td>
               <td>運費</td>
               <td></td>
               <td>60</td>
               <td></td>
               <td>60</td>
            </tr>';
            $cart_total+=60; //運費
           }?>
        <tr>
           <td></td>
           <td></a></td>
           <td></td>
           <td></td>
           <td><?php echo $cnt; ?></td>
           <td><?php echo $cart_total;?></td>
        </tr>
        </table>

		</div>
	</div>

<?php
if (isset($_POST['name'])) {
    // 預覽資訊之後 點送出訂單的同時 也建立一個資料表在orders
    $sql="INSERT INTO orders(`name`,`phone`,`address`,`create_time`,`item_number`,`amount`,`gift`,`notes`) 
    values ('" .$_POST['name']. "','" .$_POST['phone']. "','" .$_POST['address']. "',
            NOW() ,'".$cnt. "','" .$cart_total. "','" . $_POST['type']. "','".$_POST['notes']. "')";
    if ($result = mysqli_query($link, $sql))
    {
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    } else {
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    }

}
?>
<div><br><hr>
             <h3><center>填寫訂購人資料</center></h3>
             <form name="form1" id="form1" action="" method="POST">
        <table style="line-height:25px;">

            <tr>
                <td class="c_title">收件人姓名：</td>
                <td class="c_content">
                    <input type="text" name="name" size="30" maxlength="30" value="<?php echo $name; ?>">
                </td>
            </tr>
            <tr>
                <td class="c_title">收件人email：</td>
                <td class="c_content">
                    <input type="text" name="email" size="30" maxlength="30" value="<?php echo $email; ?>">
                </td>
            </tr>
            <tr>
                <td class="c_title">收件人連絡電話：</td>
                <td class="c_content">
                    <input type="text" name="phone" size="20" placeholder="ex.0912-345678" value="<?php echo $phone; ?>">
                </td>
            </tr>
            <tr>
                <td class="c_title">寄件地址：</td>
                <td class="c_content">
                    <input type="text" name="address" size="40" value="<?php echo $address; ?>">
                </td>
            </tr>
            <tr>
                <td class="c_title">備註事項：</td>
                <td class="c_content">
                    <textarea name="notes" rows="5" cols="40"><?php echo $notes; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="c_title">滿額好禮贈品：</td>
                <td class="c_content">
                    <input type="radio" name="type" value="1" <?php echo $arr_type[1]; ?>>購物金$50
                    <input type="radio" name="type" value="2" <?php echo $arr_type[2]; ?>>精美髮飾*1
                    <input type="radio" name="type" value="3" <?php echo $arr_type[3]; ?>>簡約耳環*1(恕無法換耳夾)
                </td>
            </tr>
            <br>
            <tr>
                <td class="c_title"></td>
                <td class="c_content">
                    <input type="radio" name="type2" value="1" <?php echo $type2 ?>>勾選表示我同意將我的個人資料回傳給此網站
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" class="c_button">預覽訂購資訊</button>
                    <button type="reset" class="c_button">重新填寫</button>
                </td>
            </tr>
        </table>
<?php
if (strlen(@$_POST['name']) > 0) {
	?>
        <hr>
        <table>
        <h2>交易資訊 Transaction Info</h2>
            <tr>
                <td class="c_title">收件人：</td>
                <td class="c_content"><?php echo $name;?></td>
            </tr>
            <tr>
                <td class="c_title">收件人email：</td>
                <td class="c_content"><?php echo $email;?></td>
            </tr>
            <tr>
                <td class="c_title">收件人連絡電話：</td>
                <td class="c_content"><?php echo $phone;?></td>
            </tr>
            <tr>
                <td class="c_title">寄件地址：</td>
                <td class="c_content"><?php echo $address;?></td>
            </tr>
            <tr>
                <td class="c_title">備註事項：</td>
                <td class="c_content"><?php echo nl2br($notes);?></td>
            </tr>
            <tr>
                <td class="c_title">好禮三選一：</td>
                <td class="c_content"><?php echo $arr_typename[$type];?></td>
            </tr>
            <tr>
                <td class="c_title">交易金額：</td>
                <td class="c_content">$<?php echo $cart_total;?></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" class="c_button"><?php echo '<a href="orders_check.php?order_id=3">確認並送出訂單</a>';?></button></td>
            </tr>
        </table>
<?php }?>
        </div>
    </form>
</div>


	<?php include("footer.php") ; ?>
</body>
</html>

<?php
mysqli_close($link); // 關閉資料庫連結
?>