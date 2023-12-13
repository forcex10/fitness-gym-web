<?php
include '../../../controller/ComC.php';

$clientC = new ComC();

if (!isset($_GET['idcom'])) {
    header('Location: listPost.php');
    exit;
}

// Récupérer l'ID du post associé à ce commentaire
$idcom = $_GET["idcom"];
$idpost = $clientC->getPostIdByCommentId($idcom);

// Supprimer le commentaire
$clientC->deletecom($idcom);
$_SESSION['success_message'] = "Commentaire supprimé avec succès";

// Rediriger vers listCom.php en passant l'ID du post pour afficher les commentaires restants
header("Location: listCom.php?idpost=$idpost");
exit;
?>
