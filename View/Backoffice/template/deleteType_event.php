<?php
include 'C:\xampp\htdocs\fitness-gym-web\Controller\Type_eventC.php';
$type_eventC = new type_eventC();
$type_eventC->deleteType_event($_GET["idtype_event"]);
header('Location:listeType_event.php');

?>