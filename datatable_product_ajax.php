<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
      $sql = "select * from product";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array($row["good_id"], $row["good_name"], $row["category"], $row["numbers"], $row["price"], "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}

if ($oper == "insert") {
      $sql = "insert into product(good_id,good_name,category,numbers,price) values ('" . $_POST['good_id'] . "','" . $_POST['good_name'] . "','" . $_POST['category'] . "','" . $_POST['numbers'] . "','" . $_POST['price'] . "')";
}

if ($oper == "update") {
      $sql = "update product set good_id='" . $_POST['good_id'] . "',good_name='" . $_POST['good_name'] . "',category='" . $_POST['category'] . "' ,numbers='" . $_POST['numbers'] . "',price='" . $_POST['price'] . "' ";
}

if ($oper == "delete") {
    $sql = "delete from product where good_id='" . $_POST['mid_old'] . "'";
}


if (strlen($sql) > 10) {
      if ($result = mysqli_query($link, $sql)) {
            $a["code"] = 0;
            $a["message"] = "資料" . $arr_oper[$oper] . "成功!";
      } else {
            $a["code"] = mysqli_errno($link);
            $a["message"] = "資料" . $arr_oper[$oper] . "失敗! <br> 錯誤訊息: " . mysqli_error($link);
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}
?>