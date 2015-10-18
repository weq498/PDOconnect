<?php
date_default_timezone_set('Asia/Taipei');
/***************************************
MySQL通用函數庫 v2.2 for PDO by a0000778
MIT License
***************************************/
/*參考此內容進行個人需求修正:https://github.com/a0000778/lib_php_db_mysql/blob/master/db_pdo.class.php
修改於:2015/07/29
修改者:bao
v0.1:連接、離線Mysql及撰寫select密碼
v0.2:修改套件內容(SQL語法內藏)
v0.3:修改套件內容(增加Log簡易記錄)
v0.4:新增Insert會員資料(暫定/未完成)
*/
class DB_pdo{
  private $db;
  function __construct($pdo){
  $this->db = $pdo;
  }
  function __destruct(){
  $this->disconnect();
  }
  
  static function connect( $db_host, $db_name, $db_user, $db_pwd){
    try{
      $dsn = "mysql:host=$db_host;dbname=$db_name;charset=UTF8";
      $dbh = new PDO($dsn, $db_user, $db_pwd);
      $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      return new DB_pdo($dbh);
    }
    catch(PDOException $e){
      log_save("PDOException連線錯誤",date("Y/m/d\th:i:s"));
    }
  }
  function findpasswd($account){
    $account = $this->db->quote($account);
    $sth =  $this->db->prepare("SELECT _uid ,passwd FROM account_db WHERE account=$account");
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_OBJ);
    return $result;
  }
  function disconnect(){
  $this->db=null;
  }
  function insert(){
  }
  
}
  function log_save($log_str,$log_time){
  $file="C:\Apache24\logs\web_login.log";
  $ffile=fopen($file,"rw");
  //echo fread($ffile,filesize("C:\Apache24\logs\web_login.log"));
  fwrite($ffile,$log_str."\t".$log_time."\n");
  fclose($ffile);
  }
  ?>