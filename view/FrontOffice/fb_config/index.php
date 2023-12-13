<?php
session_start();
include "fb_config.php";

if(isset($login_url)){
    include "register.php";
}
else{

    echo $_SESSION["nom"];
    echo $_SESSION["email"];
    echo '<img src='.$_SESSION["pdp"].'width=150/>';
}



?>