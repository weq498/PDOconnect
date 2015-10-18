<?php
/*
  file name:key.php writer:bao
  v0.1:生產隨機鑰匙
  
*/
session_start();
$key="";
for($i=1;$i<rand(6,12);$i++){ //產生隨機值
  switch(mt_rand(1,3)){
    case 1:
      $a = chr(mt_rand(97,122));
      break;
    case 2:
      $a = chr(mt_rand(65,90));
      break;
    case 3:
      $a = mt_rand(0,9);
      break;
  }
$key .=$a;
}
echo $key;
$_SESSION['key'] = $key;
?>