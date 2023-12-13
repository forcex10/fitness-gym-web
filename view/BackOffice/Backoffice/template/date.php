<?php
require_once "C:/xampp/htdocs/fitness-gym-web/config.php";

$sql = "SELECT COUNT(*) as total FROM commande  WHERE  (status='confirme'  AND lu = false) ";
$db = config::getConnexion();

try {
    $liste = $db->query($sql);
    $result = $liste->fetchAll();
    $total = 0;
    foreach ($result as $row) {
        $total += $row['total'];
    }
    echo $total;
} catch (Exception $e) {
    throw new Exception('Error during query execution: ' . $e->getMessage());
}
?>
