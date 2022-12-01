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
       //Splice the random string together
       $string .= sprintf('%c', $ascii);
    //    $_SESSION["helloweba_num"] = $string;
   }
   //Background color
   imagefilledrectangle($img, 0, 0, $width, $height, randBg($img));

   //Noise string
   for ($i = 0; $i < 50; $i++) {

       imagesetpixel($img, mt_rand(0, $width), mt_rand(0, $height), randPix($img));

   }
   //Putting strings
   for ($i = 0; $i < $num; $i++) {
       $x = floor($width / $num) * $i + 2;
       $y = mt_rand(0, $height - 15);

       imagechar($img, 5, $x, $y, $string[$i], randPix($img));

   }

   //Setting the type of output function:imagejpeg(); imagegif(); imagepng();
   $func = 'image' . $type;

   $header = 'Content-type:image/' . $type;

   if (function_exists($func)) {
       header($header);
       //Output the picture
       $func($img);
   } else {

       echo 'Unsupported type!';
   }
   imagedestroy($img);
   return $string;
}
//Function of Background color
function randBg($img) {
   return imagecolorallocate($img, mt_rand(130, 255), mt_rand(130, 255), mt_rand(130, 255));
}
//Function of Noise string color
function randPix($img) {
   return imagecolorallocate($img, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
}

?>