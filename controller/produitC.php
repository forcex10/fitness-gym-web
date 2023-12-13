<?php

require_once(__DIR__ . '/../Config.php');

class produitC
{
    



    public function listnotification()
{
    $sql = "SELECT id_commande FROM commande  WHERE (status='confirme'  AND lu = false )";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}





  

    public function sommeQuantiteTotale()
{
    $db = config::getConnexion();
    $query = "SELECT SUM(quantite) AS totalQuantite FROM produits";
    
    try {
        $stmt = $db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

       
        
            return $result['totalQuantite'];
       
    } catch (PDOException $e) {
        // Gérez les erreurs de la base de données
        echo 'Error: ' . $e->getMessage();
        return 0;
    }
}
public function nombreTotalProduits()
{
    $db = config::getConnexion();
    $query = "SELECT COUNT(*) AS totalProduits FROM commande";
    
    try {
        $stmt = $db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['totalProduits'];
       
    } catch (PDOException $e) {
        // Gérez les erreurs de la base de données
        echo 'Error: ' . $e->getMessage();
        return 0;
    }
}
public function nombreProduits($id)
{
    $db = config::getConnexion();
    $query = "SELECT COUNT(*) AS produit FROM produits where type=$id";
    
    try {
        $stmt = $db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['produit'];
       
    } catch (PDOException $e) {
        // Gérez les erreurs de la base de données
        echo 'Error: ' . $e->getMessage();
        return 0;
    }
}
public function verification()
{
    $db = config::getConnexion();
    $query = "SELECT COUNT(*) AS produit FROM commande where lu=1";
    
    try {
        $stmt = $db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result['produit']==$this->nombreTotalProduits()){
            return true;
        }
        else{
            return false;
        }

        
       
    } catch (PDOException $e) {
        // Gérez les erreurs de la base de données
        echo 'Error: ' . $e->getMessage();
        return 0;
    }
}
















public function pourcentage()
{
    $totale = $this->nombreTotalProduits();
    $db = config::getConnexion();
    $query = "SELECT nomtype, idtype FROM type ";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $products = array();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Calcul du pourcentage
        $pourcentage = ($this->nombreProduits($result['idtype'])/ $totale) * 100;

        // Ajout des données au tableau associatif
        $products[] = array(
            'nom' => $result['nomtype'],
            'pourcentage' => $pourcentage
        );
    }

    return $products;
}








    
   
     
    public function searchProducts($searchTerm)
    {
        $db = config::getConnexion();
        $searchTerm = '%' . $searchTerm . '%';
        $sql = "SELECT * FROM produits WHERE nom LIKE :searchTerm";
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
    $sql = "INSERT INTO produits  VALUES (NULL, :nom, :description, :prix, :quantite, :type, :image, false)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $produit->getNom(),
            'description' => $produit->getdescription(),
            'prix' => $produit->getprix(),
            'quantite' => $produit->getquantite(),
            'type' => $produit->gettype(),
            'image' => $produit->getimage(),
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
    function showtypes($type)
    {
        $sql = "SELECT * from type where idtype = $type";
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
    
    function ajouterquantite($id, $quantite)
    {
        try {
            $sql = "UPDATE produits SET 
                quantite = :quantite
                WHERE id = :id";
    
            $db = config::getConnexion();
            $query = $db->prepare($sql);
    
            $query->execute([
                'quantite' => $quantite,
                'id' => $id,
            ]);
    
            //echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // You should also echo the error message for debugging purposes
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
                    quantite = :quantite,
                    type = :type,
                    image = :image
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $produit->getNom(),
                'description' => $produit->getdescription(),
                'prix' => $produit->getprix(),
                'quantite' => $produit->getquantite(),
                'type' => $produit->gettype(),
                'image' => $produit->getimage(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
   
    function updateproduit2($produit, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produits SET 
                    nom = :nom, 
                    description = :description, 
                    prix = :prix, 
                    quantite = :quantite,
                    type = :type,
                    image = :image
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $produit['nom'],
                'description' =>$produit['description'],
                'prix' => $produit['prix'],
                'quantite' => $produit['quantite'],
                'type' => $produit['type'],
                'image' => $produit['image'],
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function trierParPrix()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM produits ORDER BY prix";
        $liste = $db->query($sql);
        return $liste;
    }





}
