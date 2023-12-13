<?php
include_once '../../../controller/typeC.php';
$typeC = new typeC();
$typeC->deletetype($_GET["id"]);
header('Location:tabletype.php');