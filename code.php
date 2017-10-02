<?php
header("Content-type:image/png");
$str = 'abcdefghijkmnpqrstuvwxyz1234567890';
$l = strlen($str);
$authnum = '';
for($i=1;$i<=4;$i++){
    $num=rand(0,$l-1);
    $authnum.= $str[$num];
}
srand((double)microtime()*1000000);
$im = imagecreate(50,20);
$black = imagecolorallocate($im, 25,25,25);
$white = imagecolorallocate($im, 255,255,255);
$gray = imagecolorallocate($im, 200,200,200);
imagefill($im,68,30,$black);
imagestring($im, 5, 8, 2, $authnum, $white);
session_start();
$_SESSION['code'] = $authnum;
imagepng($im);
imagedestroy($im);
?>