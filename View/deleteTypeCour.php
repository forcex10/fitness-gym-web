<?php
include '../controller/type_courC.php';
$clientC = new courTypeC();
$clientC->deleteTypecours($_GET["id"]);
header('Location:listTypeCour.php');