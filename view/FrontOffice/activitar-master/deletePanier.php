<?php
include "C:/xampp/htdocs/fitness-gym-web/Controller/PanierC.php";
include "C:/xampp/htdocs/fitness-gym-web/Controller/produitC.php";
include "C:/xampp/htdocs/fitness-gym-web/Model/Panier.php";
$panierC=new PanierC();
$produitC=new produitC();
$panier=$panierC->showPanierPanier($_GET['id_panier']);
$produit=$produitC->showproduit($panier['id_produit']);
$produit['quantite']+=$panier['quantite'];
$produitC->updateproduit2($produit,$produit['id']);
$panierC->deletePanier($_GET['id_panier']);
header('Location:listePanier.php');
?>

