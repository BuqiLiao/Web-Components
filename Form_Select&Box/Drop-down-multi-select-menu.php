<?php
$q = isset($_POST['q'])? $_POST['q'] : '';
if(is_array($q)) {
    $sites = array(
            'RUNOOB' => 'Runnoob: http://www.runoob.com',
            'GOOGLE' => 'Google: http://www.google.com',
            'TAOBAO' => 'Taobao: http://www.taobao.com',
    );
    foreach($q as $val) {
        echo $sites[$val]."</br>";
    }
      
} else {
?>
<form action="" method="post"> 
    <select multiple="multiple" name="q[]">
    <option value="">Choose any website</option>
    <option value="RUNOOB">Runoob</option>
    <option value="GOOGLE">Google</option>
    <option value="TAOBAO">Taobao</option>
    </select>
    <input type="submit" value="Submit">
    </form>
<?php
}
?>