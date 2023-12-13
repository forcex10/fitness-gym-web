<?php
require_once "../../../controller/type_courC.php";
require_once "../../../controller/coursC.php";

// Vérifier si l'ID du produit est passé
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Instancier la classe typeC
    
    $c = new courC();

   // echo "ID du produit avant récupération : " . $idproduit . "<br>";

    // Récupérer les détails du produit
    $courtDetails = $c->showCours($id);
    
    // Ajoutez cette déclaration pour le débogage
   /* echo "Détails du produit : ";
    print_r($produitDetails);
    echo "<br>";*/
} else {
    echo "ID du produit non spécifié.";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du cour</title>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="couraffichagee.css">
    
</header>

<div class="container">
    <div class="card">
            <div class="shoeBackground">
                <div class="gradients">
                    <div class="gradient second" color="black"></div>
                </div>
                         <h1 class="nike">cour</h1>
                        <img src="img/logo.png" alt="" class="logo">
                        <img src="images/<?= $courtDetails['image'] ?>" alt="Produit Image" class="shoe show" color="black">
                    </div>

            <div class="info">
                 <div class="shoeName">
                    <div>
                        <h1 class="big">Fitness Gym </h1>
                        <span class="new">new</span>
                    </div>
                    <?php if ($courtDetails && isset($courtDetails['nom'])) { ?>
                        <h3 class="small"><?= $courtDetails['nom'] ?></h3>
                     <?php } ?>
                     
                </div>
                <div class="description">
                    <h3 class="title">Product Info</h3>
                    <?php if (isset($courtDetails['description'])) { ?>
                     <p class="text"><?= $courtDetails['description'] ?></p>
                     <?php } ?>
                </div>


                <div class="size-container">
                    <h3 class="title">Niveau</h3>
                    <?php if (isset($courtDetails['niveau'])) { ?>
                        <p class="size active"><?= $courtDetails['niveau'] ?></p>
                     <?php } ?>
                </div>

                <div class="buy-price">
                    <a href="frontoffice/schedule.html" class="buy">View calendar</a>
                    
                </div>
         </div>
        </div>
        </div>

    
        <p>Produit non trouvé.</p>
    

<script src=""></script>
</body>

</html>
            













                    
   