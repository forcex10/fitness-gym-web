<?php
include '../../../controller/reclamationC.php';
$reclamationC = new reclamationC();
$reclamationC->deletereclamation($_GET["id"]);
header('Location:everyfile.php');



