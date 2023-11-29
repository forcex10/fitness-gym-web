<?php
// Votre code PHP pour récupérer les données en fonction du paramètre reçu
if (isset($_GET['selectedValue'])) {
    // Récupérer la valeur du paramètre envoyé par l'appel AJAX
    $selectedValue = $_GET['selectedValue'];

    // Inclure le fichier contenant les classes et les fonctions nécessaires
    include_once "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php"; // Remplacez par le chemin approprié

    // Créer une instance de votre classe TypeAbonnementC
    $TypeAbonnementC = new TypeAbonnementC(); // Assurez-vous que la classe est correctement importée

    // Utiliser les fonctions appropriées pour obtenir les données en fonction de la valeur de selectedValue
    if ($selectedValue === 'inferieur') {
        $liste = $TypeAbonnementC->listTypeAbonnementInf(12); // Remplacez 3 par la valeur souhaitée
    } else {
        $liste = $TypeAbonnementC->listTypeAbonnementSup(12); // Remplacez 3 par la valeur souhaitée
    }

    // Vérifier si des données ont été récupérées
    if ($liste->rowCount() > 0) {
        // Récupérer toutes les lignes de résultats sous forme de tableau
        $data = $liste->fetchAll(PDO::FETCH_ASSOC);

        // Renvoyer les données au format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    } else {
        // Si aucune donnée n'est disponible
        echo json_encode(['error' => 'Aucun résultat trouvé']); // Message d'erreur (ou autre action à prendre)
        exit;
    }
}
?>
