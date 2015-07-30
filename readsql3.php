<?php
include "sqlread.php";
$db_host="localhost";
$db_user="android_login";
$db_pwd="sst152";      
$db_name="hts";
$account=$_POST['account'];
$passwd=$_POST['passwd'];
if(!$db = DB_pdo::connect($db_host, $db_name, $db_user, $db_pwd)){echo "資料庫連線失敗"};
$db_read = $db->findpasswd($account);
$da_passwd = $db_read->passwd;
if($passwd==$da_passwd){
echo "OK";
}
?>