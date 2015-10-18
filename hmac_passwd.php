<?php
/*
  file:hmac_passwd.php writer:bao
  v0.1a:連接資料庫(html連接)
  v0.1b:連接資料庫程式化
  v0.2:增加session讀取，key值獲取，進行hmac資料比對
  v0.3:Android手機資料連接，進行資料比對(暫定/未完成)
*/
session_start();
include "sqlread.php";
$db_host="localhost";
$db_user="android_login";
$db_pwd="sst152";      
$db_name="hts";
$account=$_POST['account'];
if(!$db = DB_pdo::connect($db_host, $db_name, $db_user, $db_pwd)){echo "資料庫連線失敗";}
$db_read = $db->findpasswd($account);
$passwd=$db_read->passwd;
if($passwd!==null){
   $h_passwd=hash_hmac('sha256',$_SESSION['key'],$passwd);
   if($_POST['hash_passwd'] === $h_passwd){
    echo "登入成功";
    echo  $db_read->_uid;
    }
}else{echo "帳號密碼有誤，請重新輸入";}
?>