<?php
require_once "../controller/typeC.php";
include "../controller/produitC.php";

// Vérifier si l'ID du produit est passé
if (isset($_GET['id'])) {
    $idproduit = $_GET['id'];

    // Instancier la classe produitC
    $c = new produitC();

    // Récupérer les détails du produit
    $produitDetails = $c->showproduit($idproduit);
} else {
    echo "ID du produit non spécifié.";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <style>
      :root{
    --primary: #212121;
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    background-color: #efefef;
}

.container{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
    overflow: hidden;
}

.card{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 860px;
}


.first{
    z-index: 0;
    animation: 1s width ease;
}

@keyframes width{
    from{
        width: 0%;
    }
    to{
        width: 100%;
    }
}

.second{
    z-index: -1;
}

.gradient[color="black"]{
    background-image: linear-gradient(45deg, #1c1b1b, #666);
}




.share:hover{
    transform: scale(1.1);
}

.share i{
    line-height: 50px;
}

.nike{
    position: absolute;
    top: 90px;
    left: 50%;
    font-size: 8rem;
    transform: translate(-50%, -50%);
    text-transform: uppercase;
    line-height: .9;
    color: #130101;
    opacity: .1;
}



.shoe.show{
    opacity: 1;
    position: relative;
    width: 100%; /* Adjust this value to reduce the width */
    height: 100%; /* Adjust this value to reduce the height */
    box-shadow: 0 0 100px 20px rgba(36, 36, 36, 0.2);
    top: -10px; /* Adjust this value to move the element up */
    left: -3px; /* Adjust this value to move the element left */
    transition: transform 0.3s ease-in-out;
    border: 2px solid #333;
    
}
.shoe.show:hover {
    transform: scale(1.1);
    border: 2px solid #333;
  
}

.info{
    width: 50%;
    background-color: #fff;
    z-index: 1;
    padding: 35px 40px;
    box-shadow: 15px 0 35px rgba(0, 0, 0, 0.1),
    0 -15px 35px rgba(36, 36, 36, 0.1),
    0 15px 35px rgba(56, 56, 56, 0.1);
}

.shoeName{
    padding: 0 0 10px 0;
}

.shoeName div{
    display: flex;
    align-items: center;
}

.shoeName div .big{
    margin-right: 10px;
    font-size: 2rem;
    color: #333;
    line-height: 1;
}

.shoeName div .new{
    background-color:rgb(66, 65, 65);
    text-transform: uppercase;
    color: #fff;
    padding: 3px 10px;
    border-radius: 5px;
    transition: .5s;
}

.shoeName .small{
    font-weight: 500;
    color: #444;
    margin-top: 3px;
    text-transform: capitalize;
}

.shoeName, .description, .color-container, .size-container{
    border-bottom: 3px solid #dadada;
}

.description{
    padding: 10px 0;
}

.title{
    color: #3a3a3a;
    font-weight: 600;
    font-size: 1.2rem;
    text-transform: uppercase;
}

.text{
    color: #555;
    font-size: 17px;
}

.color-container{
    padding: 10px 0;
}

.colors{
    padding: 8px 0;
    display: flex;
    align-items: center;
}

.color{
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin: 0 10px;
    border: 5px solid;
    cursor: pointer;
    transition: .5s;
}

.color[color="black"]{
    background-color: #444;
    border-color: #444;
}





.color.active{
    border-color: #fff;
    box-shadow: 0 0 10px .5px rgba(0, 0, 0, 0.2);
    transform: scale(1.1);
}

.size-container{
    padding: 10px 0;
    margin-bottom: 10px;
}

.sizes{
    padding: 15px 0;
   
    align-items: center;
}

.size{
    width: 100px;
    height: 40px;
    border-radius: 6px;
    background-color: #eee;
    margin: 0 10px;
    text-align: center;
    line-height: 40px;
  
    font-weight: 500;
    cursor: pointer;
    
}

.size.active{
    background-color:rgb(66, 65, 65);
    color: #fff;
    transition: .5s;
}

.buy-price{
    padding-top: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price{
    color: #333;
    display: flex;
    align-items: flex-start;
}

.price h1{
    font-size: 2.1rem;
    font-weight: 600;
    line-height: 1;
}

.price i{
    font-size: 1.4rem;
    margin-right: 1px;
}

.buy{
    padding: .7rem 1rem;
    background-color: rgb(66, 65, 65);
    text-decoration: none;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
    font-size: 1.1rem;
    transition: .5s;
}

.buy:hover{
    transform: scale(1.1);
}

.buy i{
    margin-right: 2px;
}

@media (max-width: 1070px){
    .shoe{
        width: 135%;
    }
}

@media (max-width: 1000px){
    .card{
        flex-direction: column;
        width: 100%;
        box-shadow: 0 0 35px 1px rgba(0, 0, 0, 0.2);
    }
    
    .card > div{
        width: 100%;
        box-shadow: none;
    }

    .shoe{
        width: 100%;
        transform: rotate(-5deg) translateY(-50%);
        top: 55%;
        right: 2%;
    }

    .nike{
        top: 20%;
        left: 5%;
    }
}

@media (max-width: 600px){
    .share{
        width: 40px;
        height: 40px;
    }

    .share i {
        font-size: 1rem;
        line-height: 40px;
    }

    .logo{
        width: 70px;
    }
}

@media (max-width: 490px){
    .nike{
        font-size: 7rem;
    }

    .shoeName div .big{
        font-size: 1.3rem;
    }

    .small{
        font-size: 1rem;
    }

    .new{
        padding: 2px 6px;
        font-size: .9rem;
    }

    .title{
        font-size: .9rem;
    }

    .text{
        font-size: .8rem;
    }

    .buy{
        padding: .5rem .8rem;
        font-size: .8rem;
    }

    .price h1{
        font-size: 1.5rem;
    }

    .price i{
        font-size: .9rem;
    }

    .size{
        width: 30px;
        height: 30px;
        margin: 0 8px;
        font-size: .9rem;
        line-height: 30px;
    }

    .color{
        margin: 0 6px;
        width: 0 20px;
        width: 20px;
        height: 20px;
        border-width: 4px;
    }

    .share{
        width: 35px;
        height: 35px;
        top: 10px;
        right: 10px;
    }

    .share i{
        font-size: .8rem;
        line-height: 35px;
    }

    .logo{
        width: 60px;
        top: 10px;
        left: 10px;
    }

    .info{
        padding: 20px;
    }
}

@media (max-width: 400px){
    .buy i{
        display: none;
    }

    .container{
        padding: 20px;
    }
}
    </style>
</head>

<body>
   
    <div class="container">
    <div class="card">
            <div class="shoeBackground">
                <div class="gradients">
                    <div class="gradient second" color="black"></div>
                </div>
                         <h1 class="nike">Produit</h1>
                        <img src="img/logo.png" alt="" class="logo">
                        <img src="images/<?= $produitDetails['image'] ?>" alt="Produit Image" class="shoe show" color="black">
                    </div>
                    <div class="info">
                 <div class="shoeName">
                    <div>
                        <h1 class="big">Fitness Gym </h1>
                        <span class="new">new</span>
                    </div>
                    <?php if ($produitDetails && isset($produitDetails['nom'])) { ?>
                        <h3 class="small"><?= $produitDetails['nom'] ?></h3>
                     <?php } ?>
                     
                </div>
                <div class="description">
                    <h3 class="title">Product Info</h3>
                    <?php if (isset($produitDetails['description'])) { ?>
                     <p class="text"><?= $produitDetails['description'] ?></p>
                     <?php } ?>
                </div>
                <div class="size-container">
                    <h3 class="title">Quantite</h3>
                    <?php if (isset($produitDetails['quantite'])) { ?>
                        <p class="size active"><?= $produitDetails['quantite'] ?></p>
                     <?php } ?>
                </div>
                <div class="buy-price">
                    <a href="#" class="buy"><i class="fas fa-shopping-cart"></i>Add to card</a>
                    <div class="price">
                        <i class="fas fa-dollar-sign"></i>
                        <?php if (isset($produitDetails['prix'])) { ?>
                        <h1><?= $produitDetails['prix'] ?></h1>
                         <?php } else { ?>
                    </div>
                </div>
                 </div>
        </div>
        </div>

    
        <p>Produit non trouvé.</p>
    <?php } ?>


</body>

</html>




















