<?php
                    include "C:/xampp/htdocs/fitness-gym-web/Controller/CommandeC.php";
                    $CommandeC = new CommandeC();
                    $CommandeC->updateCommande1($_POST['id_commande']);
                    header('Location:listeCommande.php');
            ?>