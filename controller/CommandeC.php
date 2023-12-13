<?php
require_once "C:/xampp/htdocs/fitness-gym-web/config.php" ;
class CommandeC
{
    public function listCommande()
    {
        $sql = "SELECT * FROM commande";
        $db = config::getConnexion();
        try {
                    $liste =$db->query($sql);
                    return $liste;
            } 
        catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommande($ide)
    {
        $sql = "DELETE FROM commande WHERE id_commande = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);
        try {
            $req->execute();
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
    }

    function addCommande($Commande)
    {
        $sql = "INSERT INTO commande
        VALUES (NULL,:id_client,:date_commande,:status,:prix_commande,:methode,:num,:cvv,:exp,:titulaire,:adresse,:ville,:code_postale,:livraison,:lu)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
            'id_client'=> $Commande->getIdClient(),
            'date_commande' => $Commande->getDateCommande(),
            'status' => $Commande->getStatus(),
            'prix_commande' => $Commande->getPrixCommande(),
            'methode' =>$Commande->getMethode(),
            'num' =>$Commande->getNum(),
            'cvv' =>$Commande->getCvv(),
            'exp' => $Commande->getExp(),
            'titulaire' => $Commande->getTitulaire(),
            'adresse' =>$Commande->getAdresse(),
            'ville' =>$Commande->getVille(),
            'code_postale' =>$Commande->getCodePostale(),
            'livraison' =>$Commande->getLivraison(),
            'lu' =>$Commande->getLu(),
        ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            }
    }

    function showCommande($id_Commande)
    {
        $sql = "SELECT * from commande where id_commande = $id_Commande";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Commande = $query->fetch();
            return $Commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showLastCommande()
    {
        $sql = "SELECT * FROM commande WHERE id_commande = (SELECT MAX(id_commande) FROM commande)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Commande = $query->fetch();
            return $Commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCommande($Commande, $id_Commande)
    {
        $sql = "UPDATE commande SET 
                    id_client = :id_client,
                    date_commande = :date_commande,
                    status= :status,
                    prix_commande = :prix_commande,
                    methode = :methode,
                    num = :num,
                    cvv = :cvv,
                    exp = :exp,
                    titulaire = :titulaire,
                    adresse = :adresse,
                    ville = :ville,
                    code_postale = :code_postale,
                    livraison=:livraison
                WHERE id_commande = :id";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_client'=> $Commande->getIdClient(),
                'date_commande' => $Commande->getDateCommande(),
                'status' => $Commande->getStatus(),
                'prix_commande' => $Commande->getPrixCommande(),
                'methode' =>$Commande->getMethode(),
                'num' =>$Commande->getNum(),
                'cvv' =>$Commande->getCvv(),
                'exp' => $Commande->getExp(),
                'titulaire' => $Commande->getTitulaire(),
                'adresse' =>$Commande->getAdresse(),
                'ville' =>$Commande->getVille(),
                'code_postale' =>$Commande->getCodePostale(),
                'livraison' =>$Commande->getLivraison(),
                'id' => $id_Commande
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function updateCommande1($id_Commande)
{
    try {
        $sql = "UPDATE commande SET   
                    status = 'distribue'
                WHERE id_commande = $id_Commande";

        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute();
        // Vous pouvez vérifier le nombre de lignes affectées si nécessaire :
        //$rowCount = $query->rowCount();
        return true; // Succès de la mise à jour
    } catch (PDOException $e) {
        // Gérer toute erreur éventuelle ici
        echo "Erreur : " . $e->getMessage();
        return false; // Échec de la mise à jour
    }
}

function updateCommande2($id_Commande)
{
    try {
        $sql = "UPDATE commande SET   
                    status = 'confirme'
                WHERE id_commande = $id_Commande";

        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute();
        // Vous pouvez vérifier le nombre de lignes affectées si nécessaire :
        //$rowCount = $query->rowCount();
        return true; // Succès de la mise à jour
    } catch (PDOException $e) {
        // Gérer toute erreur éventuelle ici
        echo "Erreur : " . $e->getMessage();
        return false; // Échec de la mise à jour
    }
}





    

} 
?>