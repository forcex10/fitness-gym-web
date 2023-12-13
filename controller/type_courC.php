<?php

require_once(__DIR__ . '/../config.php');

class courTypeC
{

    public function listTypeCours()
    {
        $sql = "SELECT * FROM couType";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteTypecours($ide)
    {
        $sql = "DELETE FROM couType WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addTypecours($courType)
    {
        $sql = "INSERT INTO couType  
        VALUES (NULL, :nom_type,:description_type)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_type' => $courType->getTypeNom(),
                'description_type' => $courType->getTypeDescription()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showTypeCours($id)
    {
        $sql = "SELECT * from couType where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $couType = $query->fetch();
            return $couType;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateTypeCour($courType, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE couType SET 
                    nom_type = :nom, 
                    description_type = :description
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $courType->getTypeNom(),
                'description' => $courType->getTypeDescription(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

public function afficheCour($idcour) {

try {
$pdo = config::getConnexion();
$query = $pdo->prepare("SELECT * FROM cours WHERE type = :id");
$query->execute(['id' => $idcour]);
return $query->fetchAll();

} catch (PDOException $e) {
echo $e->getMessage();
}

}

public function afficheType() {
try {

$pdo = config::getConnexion();
$query = $pdo->prepare("SELECT * FROM coutype");
$query->execute();
return $query->fetchAll();

} catch (PDOException $e) {
echo $e->getMessage();

}
}

}
