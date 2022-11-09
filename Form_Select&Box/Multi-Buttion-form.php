<?php
$q = isset($_POST['q'])? $_POST['q'] : '';
if(is_array($q)) {
    $sites = array(
            'RUNOOB' => '菜鸟教程: http://www.runoob.com',
            'GOOGLE' => 'Google 搜索: http://www.google.com',
            'TAOBAO' => '淘宝: http://www.taobao.com',
    );
    foreach($q as $val) {
        echo $sites[$val]."</br>";
    }
      
} else {
?>
<form action="" method="post"> 
    <h3 name="q" value="">Chose a website:</h3>
    <input type="checkbox" name="q[]" value="RUNOOB">Runoob</option>
    <input type="checkbox" name="q[]" value="GOOGLE">Google</option>
    <input type="checkbox" name="q[]" value="TAOBAO">Taobao</option>
    <input type="submit" value="提交">
    </form>
<?php
}
?>