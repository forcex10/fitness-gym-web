<?php

require '../config.php';

class PostC
{

    public function listpost()
    {
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function deletepost($ide)
    {
        $sql = "DELETE FROM post WHERE idpost = :idpost";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idpost', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addpost($post)
    {
        $sql = "INSERT INTO post  
        VALUES (NULL, :nom, :prenom, :email, :contenu, :img)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $post->getNom(),
                'prenom' => $post->getPrenom(),
                'email' => $post->getEmail(),
                'contenu' => $post->getcontenu(),
                'img' => $post->getimg(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showpost($id)
    {
        $sql = "SELECT * from post where idpost = $id";
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
    

    function updatepost($post, $id)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE post SET 
                nom = :nom, 
                prenom = :prenom, 
                email = :email, 
                contenu = :contenu,
                img = :img
            WHERE idpost = :idpost'
        );
        
        $query->execute([
            'idpost' => $id,
            'nom' => $post->getNom(),
            'prenom' => $post->getPrenom(),
            'email' => $post->getEmail(),
            'contenu' => $post->getcontenu(),
            'img' => $post->getimg(),
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
public function affichercom($idpost)
{
    $sql = "SELECT * FROM commentaire WHERE postFK = :id"; // Utilisation de la colonne 'post'
    $db = config::getConnexion();
    
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id', $idpost, PDO::PARAM_INT); // Utilisation de $idpost
        $query->execute();
        $commentaire = $query->fetchAll();
        return $commentaire;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


    
    public function afficherpost()
    {
        $sql = "SELECT * from post";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $post = $query->fetchAll();
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
