<?php
//error_reporting(0);
$account="root";
$db_ip="localhost";
$db_user="android_login";
$db_pwd="sst152";      
$db_name="hts";
$account=$_POST['account'];                                       
$dsn="mysql:host=localhost;dbname=hts";
$db = new PDO($dsn, $db_user, $db_pwd);
$account = $db->quote($account);  //must use.Avoid SQL injection.
$sql="SELECT account FROM account_db WHERE account=$account";
$sth = $db->query($sql);
$list= $sth->fetch(PDO::FETCH_ASSOC);
  echo "{$list[account]}";
//print_r($list);
//if($list)echo "success";
$db = null;                   
?>