<?php
require_once "C:/xampp/htdocs/fitness-gym-web/config.php" ;



try {
    $db = config::getConnexion();

    // Mettre à jour toutes les notifications comme lues
    $sqlUpdateNotifications = "UPDATE commande SET lu = true WHERE status='confirme'";
    $db->exec($sqlUpdateNotifications);

    // Réinitialiser la variable de session
   

    echo "Reset successful";
} catch (Exception $e) {
    echo "Reset failed: " . $e->getMessage();
}
?>
