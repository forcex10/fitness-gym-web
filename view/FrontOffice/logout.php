<?php
session_start();
$_SESSION=array();
setcookie('email', '', time() - 3600, '/');
setcookie('password', '', time() - 3600, '/');
session_destroy();
header("Location:login.php");
?>