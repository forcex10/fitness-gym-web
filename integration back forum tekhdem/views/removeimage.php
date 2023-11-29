<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["img"])) {
    // Chemin vers l'image à supprimer
    $imagePath = $_POST["img"];

    // Supprimez le fichier image du serveur
    if (file_exists($imagePath)) {
        unlink($imagePath); // Supprime le fichier
    }

    // Redirigez vers la page précédente ou où vous le souhaitez

    exit;
}
