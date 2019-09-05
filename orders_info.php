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
    <style type="text/css">
    .error {
        color: red;
        font-weight: normal;
    }
	table{
		margin:0 auto;
	}
    </style>
</head>

<body>
    <form name="form1" id="form1" action="" method="POST">
        <table>

            <tr>
                <td class="c_title">收件人姓名：</td>
                <td class="c_content">
                    <input type="text" name="name" size="30" maxlength="30" value="<?php echo $name ?>">
                </td>
            </tr>
            <tr>
                <td class="c_title">收件人連絡電話：</td>
                <td class="c_content">
                    <input type="text" name="phone" size="11" placeholder="ex.0912-345678" value="<?php echo $phone ?>">
                </td>
            </tr>
            <tr>
                <td class="c_title">寄件地址：</td>
                <td class="c_content">
                    <input type="text" name="address" size="40" value="<?php echo $address ?>">
                </td>
            </tr>
            <tr>
                <td class="c_title">備註事項：</td>
                <td class="c_content">
                    <textarea name="notes" rows="5" cols="40"><?php echo $notes ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="c_title">滿額好禮贈品：</td>
                <td class="c_content">
                    <input type="radio" name="type" value="1" <?php echo $arr_type[1] ?>>購物金$50
                    <input type="radio" name="type" value="2" <?php echo $arr_type[2] ?>>精美髮飾*1
                    <input type="radio" name="type" value="3" <?php echo $arr_type[3] ?>>簡約耳環*1(恕無法換耳夾)
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" class="c_button">確定送出</button>
                    <button type="reset" class="c_button">重新填寫</button>
                </td>
            </tr>
        </table>
<?php
if (strlen($_POST['name']) > 0) {
	?>
        <table>
            <tr>
                <td class="c_title">好禮三選一：</td>
                <td class="c_content"><?php echo $arr_typename[$type];?></td>
            </tr>
            <tr>
                <td class="c_title">收件人：</td>
                <td class="c_content"><?php echo $name;?></td>
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
        </table>
<?php }?>
        </div>
    </form>
</body>

</html>