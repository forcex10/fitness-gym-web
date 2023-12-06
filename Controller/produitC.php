<?php

require_once "C:/xampp/htdocs/fitness-gym-web/config.php" ;

class produitC
{

    public function listproduit()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteproduit($ide)
    {
        $sql = "DELETE FROM produit WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addproduit($produit)
    {
        $sql = "INSERT INTO produit  VALUES (NULL, :nom,:description,:prix,:quantite)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $produit->getNom(),
                'description' => $produit->getdescription(),
                'prix' => $produit->getprix(),
                'quantite' => $produit->getquantite(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showproduit($id)
    {
        $sql = "SELECT * from produit where id_produit = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateproduit($produit, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    nom = :nom, 
                    prix = :prix, 
                    quantite_produit = :quantite
                WHERE id_produit= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $produit['nom'],
                'prix' => $produit['prix'],
                'quantite' => $produit['quantite_produit'],
            ]);
            
            $query->rowCount();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
