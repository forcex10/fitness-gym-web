<?php
// Vérifiez si le formulaire a été soumis
if (isset($_GET['tri'])) {
    $tri = $_GET['tri'];

    if ($tri === 'asc') {
        // Rediriger vers la page pour trier par ordre croissant
        header("Location: posttrierasc.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } elseif ($tri === 'desc') {
        // Rediriger vers la page pour trier par ordre décroissant
        header("Location: posttrierdesc.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Choix de tri non valide.";
    }
} else {
    echo "Veuillez choisir une option de tri.";
}
?>
