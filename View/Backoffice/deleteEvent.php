<?php
include '../../controller/EventC.php';
$eventC = new eventC();
$eventC->deleteEvent($_GET["idevent"]);
header('Location:listeEvent.php');

?>