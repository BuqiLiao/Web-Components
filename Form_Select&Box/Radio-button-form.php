<?php
$q = isset($_GET['q'])? htmlspecialchars($_GET['q']) : '';
if($q) {
        if($q =='RUNOOB') {
            Header("Location:http://www.runoob.com");
        } else if($q =='GOOGLE') {
            Header("Location:http://www.google.com");
        } else if($q =='TAOBAO') {
            Header("Location:http://www.taobao.com");
        }
} else {
?>
<form action="" method="get" > 
    <h3 name="q" value="">Chose a website:</h3>
    <input type="radio" name="q" value="RUNOOB">Runoob</input>
    <input type="radio"name="q" value="GOOGLE">Google</input>
    <input type="radio" name="q" value="TAOBAO">Taobao</input>
    <input type="submit" value="Submit">
    </form>
<?php
}