<?php 

//Прорисовка иконки из боьшой картинки
$ext=substr($img_new,strlen($img_new)-3);
if (($ext=="jpg") or ($ext=="JPG") or ($ext=="jpeg") or ($ext=="JPEG"))
{
$im = imagecreatefromjpeg("http://intranet/uudised_vene/2007/personal/IMG_0012.JPG");
}
elseif (($ext=="png") or ($ext=="PNG"))
{
$im = imagecreatefrompng($img_new);
}
elseif (($ext=="bmp") or ($ext=="BMP"))
{
$im = imagecreatefrombmp($img_new);
}
elseif (($ext=="gif") or ($ext=="GIF"))
{
$im = imagecreatefromgif($img_new);
}

$size=getimagesize($img_new);
$dw=$size[0] * $prc /100;
$dh=$size[1] * $prc /100;
print "Height:".$dh;
print "Width:".$dw;
$tim=imagecreate ($dw, $dh);
imagecopyresized ($tim, $im, 0, 0, 0, 0, $dw, $dh, $size[0], $size[1]);
imagepng($tim,"new.png");


?>