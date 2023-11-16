<?php
include "C:/xampp/htdocs/fitness-gym-web/model/user.php";

class config
{
private static $pdo = null;
public static function getConnexion()
{
if (!isset(self::$pdo)) {
try {
self::$pdo = new PDO(
'mysql:host=localhost;dbname=fitness_gym',
'root',
'',
[
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]
);
//echo "connected successfully";
} catch (Exception $e) {
die('Erreur: ' . $e->getMessage());
}
}
return self::$pdo;
}
}



class UserC{

    //selectionner un joueur

    public function listClients()
{
$sql = "SELECT * FROM client";
$db = config::getConnexion();
try {
$liste = $db->query($sql);
return $liste;
}
 catch (Exception $e) {
die('Error:' . $e->getMessage());
}
}

//ajouter joueur

function addClient($client)
{
    $sql = "INSERT INTO client
            VALUES (NULL, :nom, :prenom, :email, :tel, :passworde,  :typee, :diplome, :projetRc)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'email' => $client->getEmail(),
            'tel' => $client->getTel(),
            'passworde' => $client->getPassword(),
           
            'typee' => $client->getType(),
            'diplome' => $client->getDiplome(),
            'projetRc' => $client->getProjetRc(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
     
 
//delete client

function deleteClient($ide)
{
$sql = "DELETE FROM client WHERE id_client = :id";
$db = config::getConnexion();
$req = $db->prepare($sql);
$req->bindValue(':id', $ide);

try {
$req->execute();
} catch (Exception $e) {
die('Error:' . $e->getMessage());
}
}


}

?>
