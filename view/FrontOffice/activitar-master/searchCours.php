<?php
require_once "../../../controller/type_courC.php";
require_once "../../../controller/coursC.php";

$coutypeC = new courTypeC();
$all=new courC();
$tous=$all->listCours();
$types = $coutypeC->afficheType();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom_type']) && isset($_POST['search'])) {
        $idtype = $_POST['nom_type'];
        $list = $coutypeC->afficheCour($idtype);
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
    <link rel="stylesheet" href="searchcoursesss.css">
    







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
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
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
                            <li ><a href="./gallery.php">Produits</a></li>
                            <li class="active"><a href="./forum.php">Forum</a></li>
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
                        <h2>Our Courses</h2>
                        <div class="breadcrumb-controls">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Courses</span>
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
                          
                            <?php foreach ($types as $index => $type) { ?>
                                <li class="<?= isset($_POST['nom_type']) && $_POST['nom_type'] == $type['id'] ? 'active' : '' ?>" data-filter=".crossfit">
                                    <input type="radio" name="nom_type" id="type_<?= $type['id'] ?>" value="<?= $type['id'] ?>"<?= $index === 0 ? 'checked' : '' ?>>
                                    <label for="type_<?= $type['id'] ?>" data-filter=".crossfit"><?= $type['nom_type'] ?></label>
                                </li>
                            <?php } ?>
                        </ul>
                        
                    </form>
                </div>
            </div>
        </div>

        <?php if (isset($list) && !empty($list)) { ?>
    <h3 class="custom-h3">
        <?php
        if (isset($_POST["'nom_type'"]) && !empty($_POST["'nom_type'"])) {
            echo "Produits correspondants au type sélectionné";
        } else {
            echo "Aucun produit correspondant trouvé";
        }
        ?>
    </h3>
    <div class="card-container">
        <?php foreach ($list as $produit) { ?>
            <div class="custom-card">
                <a href="affichagedetailscour.php?id=<?= $produit['id'] ?>">
                    <img src="images/<?= $produit['image'] ?>" alt="Produit Image" class="product-image">
                </a>
                <h3><?= $produit['nom'] ?></h3>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <h3 class="custom-h3">
    <?php
if (isset($_POST['nom_type']) && !empty($_POST['nom_type'])) {
    echo "Aucun produit correspondant trouvé pour le type sélectionné";
} else { ?>
<div class="card-container">
    <?php foreach ($tous as $produit) { ?>
        <div class="custom-card">
            <a href="affichagedetailscour.php?id=<?= $produit['id'] ?>">
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
    function showDetails(id) {
        window.location.href = 'affichagedetailscour.php?id=' + id;
    }
</script>















<script>
document.addEventListener('DOMContentLoaded', function () {
    // Récupérer la valeur du type dans sessionStorage
    const selectedType = sessionStorage.getItem('selectedType');

    // Si une valeur est trouvée, sélectionner le type correspondant
    if (selectedType) {
        const radio = document.querySelector(#type_${selectedType});
        if (radio) {
            radio.checked = true;
            radio.parentElement.classList.add('active');
        }
    }

    // Ajouter un gestionnaire d'événements pour sauvegarder le type sélectionné lors de la soumission du formulaire
    const form = document.querySelector('.custom-form');
    if (form) {
        form.addEventListener('submit', function () {
            const selectedRadio = document.querySelector('input[name="nom_type"]:checked');
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













