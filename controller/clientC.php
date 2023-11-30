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

    //selectionner un client

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

//ajouter client

function addClient($client)
{
    $sql = "INSERT INTO client
            VALUES (NULL, :nom, :prenom, :email, :tel, :passworde,  :typee,  :diplome, :projetRc, :pdp)";
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
            'pdp' => $client->getPdp(),
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

function updateUser($client, $id)
{   
    $db = config::getConnexion();
    
    try {
        $db->beginTransaction();

        $query = $db->prepare(
            'UPDATE client SET 
                nom = :nom, 
                prenom = :prenom, 
                email = :email, 
                tel = :tel,
                passworde = :password
            WHERE id_client = :id_client'
        );
        
        $result = $query->execute([
            'id_client' => $id,
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'email' => $client->getEmail(),
            'tel' => $client->getTel(),
            'password' =>password_hash($client->getPassword(),PASSWORD_DEFAULT) ,
        ]);

        if ($result) {
            // Si la mise à jour a réussi, on commit la transaction
            $db->commit();
        } else {
            // Si la mise à jour a échoué, on rollback la transaction
            $db->rollBack();
        }

        return $result; // Retourne true si succès, false sinon
    } catch (PDOException $e) {
        // En cas d'erreur, annulez les modifications
        $db->rollBack();
        // Vous pouvez choisir de renvoyer l'erreur ou de la journaliser
        throw new Exception("Error updating user: " . $e->getMessage());
    }
}



    function showClient($id)
    {
        $sql = "SELECT * from client where id_client = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function elementExists($username)
{
    $conn = config::getConnexion();

    // Vérifier si l'email existe
    $sql = "SELECT * FROM client WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Récupérer l'ID du client s'il existe
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // Retourner null si l'utilisateur n'est pas trouvé
    return NULL;

}

function password($username, $password)
{
    $conn = config::getConnexion();

    $sql = "SELECT passworde FROM client WHERE email= :username ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $Password=$stmt->fetchColumn();
    if(password_verify($password,$Password)){
        return true;
    }

    else {
        return false;
    }
}

}



?>
