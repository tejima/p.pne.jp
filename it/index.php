<?php

$w  = (int)$_GET["w"] ?: 100;
$h  = (int)$_GET["h"] ?: 100;


if($w > 5000 || $h > 5000){
  exit;
}

header("Content-type: image/png");
$string = $_GET['text'];
$im     = imagecreate($w,$h);
$cl1 = imagecolorallocate($im, 230, 230, 230);
$cl2 = imagecolorallocate($im, 170, 170, 170);

imagefilledrectangle($im,0,0,$w,$h,$cl1);
imagestring($im, 5, 10, 10,  $w."x".$h, $cl2);
imagepng($im);
imagedestroy($im);

?>
