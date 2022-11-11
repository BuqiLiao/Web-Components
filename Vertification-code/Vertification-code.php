<?php
session_start();

$_SESSION["helloweba_num"] = check_code(100,35,4,"jpeg");


function check_code($width, $height, $num, $type) {

   $img = imagecreate($width, $height);
   $string = '';
   for ($i = 0; $i < $num; $i++) {
       $rand = mt_rand(0, 4);
       switch ($rand) {
           case 0:
               $ascii = mt_rand(48, 57); //0-9
               break;
           case 1:
               $ascii = mt_rand(65, 78); //A-N
               break;
           case 2:
               $ascii = mt_rand(80, 90); //P-Z
               break;
           case 3:
               $ascii = mt_rand(97, 110); //a-n
               break;
           case 4:
               $ascii = mt_rand(112, 122); //p-z
               break;
       }
       //chr()
       $string .= sprintf('%c', $ascii);
    //    $_SESSION["helloweba_num"] = $string;

   }
   //背景颜色
   imagefilledrectangle($img, 0, 0, $width, $height, randBg($img));

   //画干扰元素

   for ($i = 0; $i < 50; $i++) {

       imagesetpixel($img, mt_rand(0, $width), mt_rand(0, $height), randPix($img));

   }
   //写字
   for ($i = 0; $i < $num; $i++) {
       $x = floor($width / $num) * $i + 2;
       $y = mt_rand(0, $height - 15);

       imagechar($img, 5, $x, $y, $string[$i], randPix($img));

   }

   //imagejpeg

   $func = 'image' . $type;

   $header = 'Content-type:image/' . $type;

   if (function_exists($func)) {
       header($header);
       $func($img);
   } else {

       echo '图片类型不支持';
   }
   imagedestroy($img);
   return $string;
}
//浅色的背景
function randBg($img) {
   return imagecolorallocate($img, mt_rand(130, 255), mt_rand(130, 255), mt_rand(130, 255));
}
//深色的字或者点这些干 扰元素
function randPix($img) {
   return imagecolorallocate($img, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
}

?>