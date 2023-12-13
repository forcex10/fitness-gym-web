<?php 
session_start();
 include "C:/xampp/htdocs/fitness-gym-web/Controller/PanierC.php";
 $id_client=$_SESSION['id'];
 $panierC = new PanierC();
 $listee = $panierC->showPanierClient($id_client);
 $quant=0;
 foreach ($listee as $p ) : 
     $quant+=$p['quantite']; 
 endforeach;
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/typeC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/produitC.php";
$typec = new typeC();
$all=new produitC();
$tous=$all->listproduits();


$type = $typec->affichertype();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["type"]) && isset($_POST["search"])) {
      
        $idtype = $_POST["type"];
        $list = $typec->afficherproduits($idtype);
    }
    
    
}



?>



















<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Activitar Template">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activitar | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

<style>
.custom-h3 {
    color: white;
    text-align: center;
    margin: 0 auto;
}
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
}

.custom-card:hover {
    transform: scale(1.1);
}

.custom-card img {
    max-width: 100%;
    height: auto;
    border-radius: 8px 8px 0 0;
}

.custom-card h3 {
    text-align: center;
    padding: 10px;
    margin: 0;
}

.custom-card-link {
    display: block;
    text-align: center;
    padding: 10px;
    color: #fff;
    text-decoration: none;
    border-top: 1px solid #fbfbfb;
    border-radius: 0 0 8px 8px;
    transition: background-color 0.3s;
}
.custom-card {
    width: 250px;
    margin-bottom: 20px;
    background-color: rgba(244, 11, 11, 0.552); /* Transparent background */
    border: 1px solid rgba(238, 37, 37, 0.452); /* Transparent border */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(139, 54, 54, 0.919); /* Transparent shadow */
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s, background 0.3s; 
}

.custom-card:hover {
    transform: scale(1.1); /* Zoom in on hover */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    background: linear-gradient(90deg, #c4cbd0, #c8d1d7);
}

.custom-card img {
    max-width: 100%;
    height: auto;
    border-radius: 8px 8px 0 0;
    transition: transform 0.3s ease-in-out, filter 0.3s;
}

.custom-card:hover img {
    transform: scale(1.1);
    filter: brightness(1.2); 
}

.custom-card h3 {
    text-align: center;
    padding: 30px;
    margin: 5;
}
.custom-card-link {
    display: block;
    text-align: center;
    padding: 10px;
    background-color: #c1d8e8;
    color: #fff;
    text-decoration: none;
    border-top: 1px solid #fcf1f1;
    border-radius: 0 0 8px 8px;
    transition: background-color 0.3s;
}
.custom-card-link:hover {
    background-color: #f3f1f1;
}
@keyframes backgroundAnimation {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

@keyframes gradientAnimation {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
.product-image {
        max-width: 100%;
        height: auto;
        border: 2px solid #000406;
        border-radius: 5px;
        display: block;
        margin: 0 auto;
        transition: transform 0.3s ease-in-out; /* Added transition for a smooth effect */
    }
    .product-image {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    display: block;
    margin: 0 auto;
    transition: transform 0.3s;
    transform: scale(1.1);
}
    .product-image:hover {
    transform: scale(1.1);
}
input[type="submit"] {
    background-color: #da2623; /* Blue color for the submit button */
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}
input[type="submit"]:hover {
    background-color: rgb(84, 11, 4); /* Darker blue on hover */
}
.custom-form input[type="radio"] {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 20px; /* ou toute autre largeur souhaitée pour le "bouton" */
    height: 20px; /* ou toute autre hauteur souhaitée pour le "bouton" */
    border: 2px solid #555; /* ou toute autre couleur de bordure souhaitée */
    border-radius: 50%; /* pour rendre un "bouton" circulaire */
    outline: none; /* supprime le contour par défaut sur la sélection */
    cursor: pointer;
}

.custom-form input[type="radio"]:checked {
    background-color: #555; /* ou toute autre couleur souhaitée pour l'état sélectionné */
    border: 2px solid #555; /* assure la cohérence de la bordure lorsque sélectionné */
}
.custom-form input[type="radio"] {
    display: none;
}

.gallery-controls ul li.active {
    color: red; /* Couleur du texte rouge */
    /* Ajoutez d'autres styles nécessaires pour indiquer l'élément actif */
}


.custom-submit {
    margin: 80px;
    padding: 15px 30px; /* Adjust padding as needed */
    border: 2px solid #000; /* Border color and size */
    border-radius: 8px; /* Adjust border-radius as needed */
    width: 200px; /* Adjust the width as needed */
}





















</style>


<style>
        .toti2,.badge{
        color :white;
    }
    </style>
</head>

<body>


    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="container-fluid">
            <div class="logo">
                <a href="./index.html">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <div class="top-social">
                 <a href="listePanier.php"><img src="img/panier2.png"></a>
                <label class="badge" id="badge"><?php  echo $quant; ?></label>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="container">
                <div class="nav-menu">
                    <nav class="mainmenu mobile-menu">
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="./about-us.html">About us</a></li>
                            <li><a href="./schedule.html">Schedule</a></li>
                            <li class="active"><a href="./gallery.php">Produits</a></li>
                            <li><a href="./listPost.php">Forum</a></li>
                            <li><a href="./contact.html">Contacts</a></li>
                            <li><a href="./searchCours.php">Cours</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg spad" data-setbg="img/about-bread.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Produits</h2>
                        <div class="breadcrumb-controls">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Produits</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Gallery Section Begin -->
    <section class="gallery-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="gallery-controls">
                    <form action="" method="POST" class="custom-form">
                        <input type="submit" value="Rechercher" name="search" class="custom-submit">
                        <ul>
                            <?php foreach ($type as $index => $types) { ?>
                                <li class="<?= isset($_POST['type']) && $_POST['type'] == $types['idtype'] ? 'active' : '' ?>" data-filter=".crossfit">
                                    <input type="radio" name="type" id="type_<?= $types['idtype'] ?>" value="<?= $types['idtype'] ?>" <?= $index === 0 ? 'checked' : '' ?>>
                                    <label for="type_<?= $types['idtype'] ?>" data-filter=".crossfit"><?= $types['nomtype'] ?></label>
                                </li>
                            <?php } ?>
                        </ul>
                    </form>
                </div>
            </div>
            <?php if (isset($list) && !empty($list)) { ?>
    <h3 class="custom-h3">
        <?php
        if (isset($_POST["type"]) && !empty($_POST["type"])) {
            echo "Produits correspondants au type sélectionné";
        } else {
            echo "Aucun produit correspondant trouvé";
        }
        ?>
    </h3>
    <div class="card-container">
        <?php foreach ($list as $produit) { ?>
            <div class="custom-card">
                <a href="details_produit.php?id=<?= $produit['id'] ?>">
                    <img src="images/<?= $produit['image'] ?>" alt="Produit Image" class="product-image">
                </a>
                <h3><?= $produit['nom'] ?></h3>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <h3 class="custom-h3">
    <?php
if (isset($_POST["type"]) && !empty($_POST["type"])) {
    echo "Aucun produit correspondant trouvé pour le type sélectionné";
} else { ?>
<div class="card-container">
    <?php foreach ($tous as $produit) { ?>
        <div class="custom-card">
            <a href="details_produit.php?id=<?= $produit['id'] ?>">
                <img src="images/<?= $produit['image'] ?>" alt="Produit Image" class="product-image">
            </a>
            <h3><?= $produit['nom'] ?></h3>
        </div>
    <?php } ?>
</div>
<?php } ?>
    </h3>
<?php } ?>
        </div>
    </div>
</section>
<script>
window.embeddedChatbotConfig = {
chatbotId: "_baBPa7PGyYT8Kqssh4oN",
domain: "www.chatbase.co"
}
</script>
<script
src="https://www.chatbase.co/embed.min.js"
chatbotId="_baBPa7PGyYT8Kqssh4oN"
domain="www.chatbase.co"
defer>
</script>



    <!-- Cta Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo-item">
                        <div class="f-logo">
                            <a href="#"><img src="img/logo.png" alt=""></a>
                        </div>
                        <p>Despite growth of the Internet over the past seven years, the use of toll-free phone numbers
                            in television advertising continues.</p>
                        <div class="social-links">
                            <h6>Follow us</h6>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Our Blog</h5>
                        <div class="footer-blog">
                            <a href="#" class="fb-item">
                                <h6>Most people who work</h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> Jan 02, 2019</span>
                            </a>
                            <a href="#" class="fb-item">
                                <h6>Freelance Design Tricks How </h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> Jan 02, 2019</span>
                            </a>
                            <a href="#" class="fb-item">
                                <h6>have a computer at home have had </h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> Jan 02, 2019</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Program</h5>
                        <ul class="workout-program">
                            <li><a href="#">Bodybuilding</a></li>
                            <li><a href="#">Running</a></li>
                            <li><a href="#">Streching</a></li>
                            <li><a href="#">Weight Loss</a></li>
                            <li><a href="#">Gym Fitness</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h5>Get Info</h5>
                        <ul class="footer-info">
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>Phone:</span>
                                (12) 345 6789
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <span>Email:</span>
                                Colorlib.info@gmail.com
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span>Address</span>
                                Iris Watson, Box 283 8562, NY
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="ct-inside"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>





    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Récupérer la valeur du type dans sessionStorage
    const selectedType = sessionStorage.getItem('selectedType');

    // Si une valeur est trouvée, sélectionner le type correspondant
    if (selectedType) {
        const radio = document.querySelector(`#type_${selectedType}`);
        if (radio) {
            radio.checked = true;
            radio.parentElement.classList.add('active');
        }
    }

    // Ajouter un gestionnaire d'événements pour sauvegarder le type sélectionné lors de la soumission du formulaire
    const form = document.querySelector('.custom-form');
    if (form) {
        form.addEventListener('submit', function () {
            const selectedRadio = document.querySelector('input[name="type"]:checked');
            if (selectedRadio) {
                // Stocker la valeur du type dans sessionStorage
                sessionStorage.setItem('selectedType', selectedRadio.value);
            }
        });
    }
});
</script>














</body>

</html>