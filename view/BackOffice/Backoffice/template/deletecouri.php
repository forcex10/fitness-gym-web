<?php
include_once '../../../../controller/coursC.php';
$clientC = new courC();
$clientC->deletecours($_GET["id"]);
header('Location:listcouri.php');