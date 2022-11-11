<?php
session_start();

$code = trim($_POST['code']);

if(strtolower($code) == strtolower($_SESSION["helloweba_num"])){

  echo '1';

}
?>