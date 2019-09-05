<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
      $sql = "select * from member";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array($row["mid"], $row["username"], $row["first_name"], $row["last_name"], $row["birthday"], $row["email"], $row["password"], $row["mobile"], "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}

if ($oper == "insert") {
      $sql = "insert into member(mid,username,first_name,last_name,birthday,email,password,mobile) values ('" . $_POST['mid'] . "','" . $_POST['username'] . "','" . $_POST['first_name'] . "','" . $_POST['last_name'] . "','" . $_POST['birthday'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . $_POST['mobile'] . "')";
}

if ($oper == "update") {
      $sql = "update member set username='" . $_POST['username'] . "',first_name='" . $_POST['first_name'] . "',last_name='" . $_POST['last_name'] . "' ,birthday='" . $_POST['birthday'] . "',email='" . $_POST['email'] . "',password='" . $_POST['password'] . "',mobile='" . $_POST['mobile'] . "' where mid='" . $_POST['mid_old'] . "' ";
}

if ($oper == "delete") {
    $sql = "delete from member where mid='" . $_POST['mid_old'] . "'";
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