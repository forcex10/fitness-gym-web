<?php
include "C:/xampp/htdocs/fitness-gym-web/Controller/AbonnementC.php";
$abonnementC=new AbonnementC();
$abonnementC->deleteAbonnement($_GET['Id_Abonnement']);
header('Location:listeAbonnement.php');
?>

