<?php
include 'C:\xampp\htdocs\fitness-gym-web\Controller\EventC.php';
$eventC = new eventC();
$eventC->deleteEvent($_GET["idevent"]);
header('Location:listeEvent.php');

?>