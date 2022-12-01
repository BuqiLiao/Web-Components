<?php
//Open and the file with write permission
$fp=fopen('message.txt','a');

//Set time
$time=time();

//Get username
$username=trim($_POST['username']);
//Get content
$content=trim($_POST['content']);


//Use "$#" to separate username and content
//Use "&^" to seperate different comment 
if($username!="" && $content!=""){
    $string=$username.'$#'.$content.'$#'.$time.'&^';
}
//Write the file
fwrite($fp,$string);

//Close the file
fclose($fp);

//Redirect to the Comment Block
header('location:CommentBlock-test.php');


?>