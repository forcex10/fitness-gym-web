<?php
include "C:/xampp/htdocs/fitness-gym-web/Controller/CommandeC.php";
$CommandeC=new CommandeC();
$CommandeC->deleteCommande($_GET['id_commande']);
header('Location:listeCommande.php');
?>

