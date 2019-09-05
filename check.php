<?php
// session_start();
$link = mysqli_connect("localhost", "root", "root123456", "group_12") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
/*if($_SESSION['level']<2)
{
    header("Location:account.php");
}*/

if ($result = mysqli_query($link, "SELECT * FROM member")) {
    while ($row = mysqli_fetch_assoc($result)) {      
            if (@$_POST['username'] == "admin" && @$_POST['pwd'] == "admin123456") {
            $_SESSION['username'] = "admin";
            $_SESSION['level'] = 9; //管理者
            
            }
            if(@$_POST['username'] == $row["username"] && @$_POST['pwd'] == $row["password"])
            {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['level'] = 2; //會員
                
            }                        
        } 

    mysqli_free_result($result); // 釋放佔用的記憶體
}
//if ($result = mysqli_query($link, "SELECT * FROM product ")) {
//    $_SESSION['count']=0;
//    $_SESSION['total']=0;
//    while ($row = mysqli_fetch_assoc($result)) {                 
//        if($row["id"]==@$_SESSION['account'])
//        {
//            for ($i=1; $i < 11; $i++)
//            {
//                $j=$row["p$i"];
//                if($row["p$i"] > 0)
//                {
//                    if ($result1 = mysqli_query($link, "SELECT * FROM picture where id  = $i")) 
//                    {
//                        while ($row1 = mysqli_fetch_assoc($result1)) 
//                        {
//                            $_SESSION['count']+=1;
//                            $_SESSION['total']+=$j*$row1["price"];
//                        }
//                        mysqli_free_result($result1); // 釋放佔用的記憶體
//                    }
//                }
//            }  
//        }                        
//    } 

//}
// mysqli_close($link); // 關閉資料庫連結
?>