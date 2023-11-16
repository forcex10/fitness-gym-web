<?php

require '../config.php';

class produitC
{

    public function listproduits()
    {
        $sql = "SELECT * FROM produits";
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
        $sql = "DELETE FROM produits WHERE id = :id";
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
        $sql = "INSERT INTO produits  VALUES (NULL, :nom,:description,:prix,:quantite)";
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
        $sql = "SELECT * from produits where id = $id";
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
                'UPDATE produits SET 
                    nom = :nom, 
                    description = :description, 
                    prix = :prix, 
                    quantite = :quantite
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $produit->getNom(),
                'description' => $produit->getdescription(),
                'prix' => $produit->getprix(),
                'quantite' => $produit->getquantite(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
