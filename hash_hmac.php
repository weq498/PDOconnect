<!-- this php is a test file!
write at 2015/07/16  03:00
 function:generate random passwd & hmac
 writer:bao
 v0.2 :2015/08/22
 function:創造函數以供方便使用
 writer:bao
 -->
<?php

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
echo $key."</br>";
echo hash_hmac('sha256',$key,'des52019');
?>