<?php

require_once(__DIR__ . '/../config.php');

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
    $sql = "INSERT INTO post (nom, prenom, email, contenu, img, date) VALUES (:nom, :prenom, :email, :contenu, :img, :date)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $post->getNom(),
            'prenom' => $post->getPrenom(),
            'email' => $post->getEmail(),
            'contenu' => $post->getcontenu(),
            'img' => $post->getimg(),
            'date' => $post->getdate() // Assurez-vous que getdate() récupère la valeur de la date correctement
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
                img = :img,
                date = :date
            WHERE idpost = :idpost'
        );
        
        $query->execute([
            'idpost' => $id,
            'nom' => $post->getNom(),
            'prenom' => $post->getPrenom(),
            'email' => $post->getEmail(),
            'contenu' => $post->getcontenu(),
            'img' => $post->getimg(),
            'date' => $post->getdate()
            
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

   


    function listPostsSortedByCommentCountAscending() {
        $db = config::getConnexion();

        // Requête SQL pour récupérer les posts triés par le nombre de commentaires (ordre croissant)
        $query = "SELECT post.*, COUNT(commentaire.postFK) AS comment_count 
                  FROM post 
                  LEFT JOIN commentaire ON post.idpost = commentaire.postFK 
                  GROUP BY post.idpost 
                  ORDER BY comment_count ASC";
    
        try {
            $results = $db->query($query);
            if ($results) {
                return $results->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return [];
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    function listPostsSortedByCommentCountDescending() {
        $db = config::getConnexion();

        // Requête SQL pour récupérer les posts triés par le nombre de commentaires (ordre décroissant)
        $query = "SELECT post.*, COUNT(commentaire.postFK) AS comment_count 
                  FROM post 
                  LEFT JOIN commentaire ON post.idpost = commentaire.postFK 
                  GROUP BY post.idpost 
                  ORDER BY comment_count DESC";
    
        try {
            $results = $db->query($query);
            if ($results) {
                return $results->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return [];
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    public function getNumberOfComments($postId) {
        $sql = "SELECT COUNT(*) AS total_comments FROM commentaire WHERE postFK = :postId";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':postId', $postId, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['total_comments'];
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    
}
