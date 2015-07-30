<?php
  $db_host="localhost";
  $db_user="android_login";
  $db_pwd="sst152";      
  $db_name="hts";
	$dsn = "mysql:host=$db_host;dbname=$db_name;charset=UTF8";
	$dbh = new PDO($dsn, $db_user, $db_pwd);
  $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $account=$_POST['account'];
  $passwd=$_POST['passwd'];
  $account=$dbh->quote($account);
	$sql = "SELECT _uid, passwd FROM account_db WHERE account=$account";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$result = $sth->fetch(PDO::FETCH_OBJ);
  //print_r($result);
	//echo $result->_uid."\t".$result->passwd;
  $da_passwd = $result->passwd;
  if($passwd==$da_passwd){
    echo "OK";
    echo $result->_uid;
  }     
	$dbh = NULL;
?>