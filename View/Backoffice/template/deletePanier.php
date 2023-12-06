<?php
include "C:/xampp/htdocs/fitness-gym-web/Controller/PanierC.php";
$PanierC=new PanierC();
$PanierC->deletePanier($_GET['id_Panier']);
header('Location:listePanier.php');
?>

