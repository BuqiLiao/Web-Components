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
<form action="" method="get"> 
    <select name="q">
    <option value="">Chose a website</option>
    <option value="RUNOOB">Runoob</option>
    <option value="GOOGLE">Google</option>
    <option value="TAOBAO">Taobao</option>
    </select>
    <input type="submit" value="Submit">
    </form>
<?php
}