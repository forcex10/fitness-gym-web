<?php
require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";
$userC=new UserC();
$userC->deleteClient($_GET['id_client']);
header('Location:listeUtilisateur.php');
?>