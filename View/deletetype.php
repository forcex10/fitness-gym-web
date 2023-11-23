<?php
include '../controller/typeC.php';
$typeC = new typeC();
$typeC->deletetype($_GET["id"]);
header('Location:listetype.php');