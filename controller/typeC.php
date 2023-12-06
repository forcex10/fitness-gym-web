<?php

require '../config.php';

class typeC
{
       
   
       
    public function searchtype($search)
    {
        $db = config::getConnexion();
        $search = '%' . $search . '%';
      
        $sql = "SELECT * FROM type WHERE nomtype LIKE :searchTerm";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':searchTerm', $search);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    public function listetype()
    {
        $sql = "SELECT * FROM type";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletetype($ide)
    {
        $sql = "DELETE FROM type WHERE idtype = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addtype($type)
    {
        $sql = "INSERT INTO type  VALUES (NULL, :nomtype,:descriptiontype)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomtype' => $type->getNomtype(),
                'descriptiontype' => $type->getdescriptiontype(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showtype($id)
    {
        $sql = "SELECT * from type where idtype = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $type = $query->fetch();
            return $type;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatetype($type, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE type SET 
                    nomtype = :nomtype, 
                    descriptiontype = :descriptiontype
                    
                WHERE idtype= :idtype'
            );
            
            $query->execute([
                'idtype' => $id,
                'nomtype' => $type->getNomtype(),
                'descriptiontype' => $type->getdescriptiontype(),
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function afficherproduits($id)
    {
        $sql = "SELECT * from produits where type = :id";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $produits = $query->fetchAll();
            return $produits;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function affichertype()
    {
        $sql = "SELECT * from type";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $types = $query->fetchAll();
            return $types;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function trierParnom()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM type ORDER BY nomtype";
        $liste = $db->query($sql);
        return $liste;
    }
    


}
