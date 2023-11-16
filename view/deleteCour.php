<?php
include '../controller/coursC.php';
$clientC = new courC();
$clientC->deletecours($_GET["id"]);
header('Location:listCour.php');