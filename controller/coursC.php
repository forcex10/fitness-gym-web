<?php

require '../config.php';

class courC
{

    public function listCours()
    {
        $sql = "SELECT * FROM cours";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecours($ide)
    {
        $sql = "DELETE FROM cours WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addcours($cours)
    {
        $sql = "INSERT INTO cours  
        VALUES (NULL, :nom,:description,:prix,:niveau,:type,:image)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $cours->getNom(),
                'description' => $cours->getDescription(),
                'prix' => $cours->getprix(), 
                'niveau' => $cours->getniveau(),
                'type' => $cours->gettypes(),
                'image' => $cours->getimage(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showCours($id)
    {
        $sql = "SELECT * from cours where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $cours = $query->fetch();
            return $cours;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function showtypess($type)
    {
        $sql = "SELECT * from coutype where id = $type";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $cours = $query->fetch();
            return $cours;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCour($cours, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE cours SET 
                    nom = :nom, 
                    description = :description, 
                    prix = :prix, 
                    niveau = :niveau,
                    type = :type,
                    image= :image
                WHERE id= :idCour'
            );
            
            $query->execute([
                'idCour' => $id,
                'nom' => $cours->getNom(),
                'description' => $cours->getDescription(),
                'prix' => $cours->getprix(),
                'niveau' => $cours->getniveau(),
                'type' => $cours->gettypes(),
                'image' => $cours->getimage(),

            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

        public function trieprix(){
            $sql = "SELECT * from cours ORDER BY prix" ;
        $db = config::getConnexion();
        $trie = $db->query($sql);
        return $trie;
        }

        public function searchcour($searchTerm)
    {
        $db = config::getConnexion();
        $searchTerm = '%' . $searchTerm . '%';
        $sql = "SELECT * FROM cours WHERE nom LIKE :searchTerm";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':searchTerm', $searchTerm);
            $stmt->execute();
            // Utilisez fetchAll si vous vous attendez à plusieurs résultats
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }




}
