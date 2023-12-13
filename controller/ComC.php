<?php

require_once(__DIR__ . '/../config.php');

class ComC
{

    public function listcom()
    {
        $sql = "SELECT * FROM commentaire";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecom($ide)
    {
        $sql = "DELETE FROM commentaire WHERE idcom = :idcom";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idcom', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addcom($commentaire)
{
    $sql ="INSERT INTO commentaire (nom, prenom, email, contenu, img, date, postFK) VALUES (:nom, :prenom, :email, :contenu, :img, :date, :postFK)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $commentaire->getNom(),
            'prenom' => $commentaire->getPrenom(),
            'email' => $commentaire->getEmail(),
            'contenu' => $commentaire->getcontenu(),
            'img' => $commentaire->getimg(),
            'date' => $commentaire->getdate(),
            'postFK' => $commentaire->getpostFK(), // Utilisation de getpostFK pour récupérer la clé étrangère postFK
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



    function showcom($id)
    {
        $sql = "SELECT * from commentaire where postFK = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $post = $query->fetch();
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showcom2($id)
    {
        $sql = "SELECT * from commentaire where idcom = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $post = $query->fetch();
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function updatecom($com, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commentaire SET 
                    nom = :nom,
                    prenom = :prenom,
                    email = :email,
                    contenu= :contenu,
                    img = :img,
                    date = :date,
                    postFK = :postFK
                WHERE idcom = :id'
            );
    
            $result = $query->execute([
                'nom' => $com->getNom(),
                'prenom' => $com->getPrenom(),
                'email' => $com->getEmail(),
                'contenu' => $com->getcontenu(),
                'postFK' => $com->getpostFK(),
                'img' => $com->getimg(),
                'date' => $com->getdate(),
                'id' => $id // Binding the $id parameter
            ]);
    
            if ($result) {
                $db->commit();
                return $query->rowCount() . " records UPDATED successfully <br>";
            } else {
                $db->rollBack();
                return "Failed to update records";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCommentsByPostID($post_id) {
        $sql = "SELECT * FROM commentaire WHERE postFK = :post_id";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $query->execute();
            $comments = $query->fetchAll();
            return $comments;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getPostIdByCommentId($idcom) {
        $sql = "SELECT postFK FROM commentaire WHERE idcom = :idcom";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idcom', $idcom, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['postFK'];
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getPostOwnerName($idpost) {
        $sql = "SELECT nom, prenom FROM post WHERE idpost = :idpost";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idpost', $idpost, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    


    


    

}