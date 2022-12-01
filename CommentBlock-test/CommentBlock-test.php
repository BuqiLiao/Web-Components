<?Php
//Set timezone
date_default_timezone_set('PRC');
// unlink('message.txt'); //Delete txt

//Get the content of the file
@$string = file_get_contents('message.txt');

//Determin whether there is content in file
if (isset($string)) {

    //Delete the both sides of "&^"
    $string = rtrim($string, '&^');
    //Separate content with "&^"
    $arr = explode('&^', $string);
    if (isset($string)){
        foreach ($arr as $value) {
        //Separate username and content
        list($username, $content, $time) = explode('$#', $value);
        }

        echo 'Username:<font color="gree">' . $username . '</font>Content:<font color="red">' . $content . '</font>Time(' . date('Y-m-d H:i:s', $time) . ')';
        echo '<hr />';
    }
}
?>
<h1>Comment Block</h1>
<form action="write.php" method="post">
    Username:<input type="text" name="username" /><br />
    Content:<textarea name="content"></textarea><br />
    <input type="submit" value="Submit" />
</form>