<?php
include '../controller/produitC.php';
$produitC = new produitC();
$produitC->deleteproduit($_GET["id"]);
header('Location:listeproduits.php');
