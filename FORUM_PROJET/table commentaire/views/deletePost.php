<?php
include '../controller/PostC.php';

$clientC = new PostC();

if (!isset($_GET['idpost'])) {
    header('Location: listPost.php');
    exit;
}

$clientC->deletepost($_GET["idpost"]);
header('Location: listPost.php');
exit;
?>
