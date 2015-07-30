<!-- this php is a test file!
write at 2015/07/16  03:00
 function:generate random passwd & hmac
 writer:bao
 -->
<?php
$number=dechex(mt_rand()); //產生隨機值
//echo $number;
echo hash_hmac('sha256','1','1');


?>