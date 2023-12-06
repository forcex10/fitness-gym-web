<?php
require_once "C:/xampp/htdocs/fitness-gym-web/config.php" ;
class PanierC
{
    public function listPanier()
    {
        $sql = "SELECT * FROM panier";
        $db = config::getConnexion();
        try {
                    $liste =$db->query($sql);
                    return $liste;
            } 
        catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deletePanier($ide)
    {
        $sql = "DELETE FROM panier WHERE id_panier = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);
        try {
            $req->execute();
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
    }

    public function addPanier($panier)
    {
        $sql = "INSERT INTO panier
        VALUES (NULL,:id_client,:id_produit,:quantite,:totale)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
            'id_produit'=> $panier->getIdProduit(),
            'id_client'=> $panier->getIdClient(),
            'quantite' => $panier->getQuantite(),
            'totale' => $panier->getTotale(),
        ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            }
    }

    function updatePanier($panier, $id_panier)
    {
        $sql = "UPDATE panier SET 
                    id_client = :id_client,
                    id_produit = :id_produit,
                    quantite= :quantite,
                    totale= :totale
                WHERE id_panier = :id";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_client' => $panier->getIdClient(),
                'id_produit' => $panier->getIdProduit(),
                'quantite' => $panier->getQuantite(),
                'totale' => $panier->getTotale(),
                'id' =>$id_panier
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showPanierPanier($id_panier)
    {
        $sql = "SELECT * from panier where id_panier=$id_panier ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $abonnement = $query->fetch();
            return $abonnement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    
    function showPanier($id_client,$id_produit)
    {
        $sql = "SELECT * from panier where id_produit =$id_produit AND id_client=$id_client ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $abonnement = $query->fetch();
            return $abonnement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showPanierClient($id_client)
    {
        $sql = "SELECT * from panier where id_client=$id_client ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $abonnement = $query->fetchALL();
            return $abonnement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    

} 
?>