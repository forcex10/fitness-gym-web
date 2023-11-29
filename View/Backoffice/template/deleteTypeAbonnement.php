<?php
include "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
$typeabonnementC=new TypeAbonnementC();
$typeabonnementC->deleteTypeAbonnement($_GET['id_type_abo']);
header('Location:listeTypeAbonnement.php');
?>

