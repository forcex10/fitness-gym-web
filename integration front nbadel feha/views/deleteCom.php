<?php
include '../controller/ComC.php';

$clientC = new ComC();

if (!isset($_GET['idcom'])) {
    header('Location: listCom.php');
    exit;
}

$clientC->deletecom($_GET["idcom"]);
header('Location: listCom.php');
exit;
?>
