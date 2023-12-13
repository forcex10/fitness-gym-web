<?php
session_start();
    include "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
    include "C:/xampp/htdocs/fitness-gym-web/Controller/PanierC.php";
    $id_client=$_SESSION['id'];
    $panierC = new PanierC();
    $listee = $panierC->showPanierClient($id_client);
    $quant=0;
    foreach ($listee as $p ) : 
        $quant+=$p['quantite']; 
    endforeach;
    $TypeAbonnementC = new TypeAbonnementC();
    $list = $TypeAbonnementC->listTypeAbonnement();
?>



<!DOCTYPE html>
<html lang="zxx">

<head>
<style>
        .toti2,.badge{
        color :white;
    }
    </style>
    
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleCheckbox = document.getElementById('toggle-checkbox');
            var abonnementsContainer = document.getElementById('abonnements-container');
            afficherAbonnements();
            function afficherAbonnements() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var responseData = JSON.parse(xhr.responseText);
                updateAbonnements(responseData);
            } else {
                console.error('Une erreur s\'est produite lors de la récupération des données.');
            }
        }
    };

    // Envoyer une requête AJAX pour récupérer les abonnements dont la durée est inférieure à 3
    xhr.open('GET', 'affiche.php?selectedValue=inferieur', true);
    xhr.send();
}


            toggleCheckbox.addEventListener('change', function() {
                var selectedValue = toggleCheckbox.checked ? 'inferieur' : 'superieur';
                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var responseData = JSON.parse(xhr.responseText);
                            updateAbonnements(responseData);
                        } else {
                            console.error('Une erreur s\'est produite lors de la récupération des données.');
                        }
                    }
                };

                xhr.open('GET', 'affiche.php?selectedValue=' + selectedValue, true);
                xhr.send();
            });

            function updateAbonnements(data) {
            var abonnementsHTML = '';

            if (data.length > 0) {
                var i = 0;
             data.forEach(function(abonnement) {
             // Initialisation de $i à 0
             if (abonnement.duree > 6) {
            i = 9;
        } else {
            i = i * 2 + 1;
        }
            abonnementsHTML += `
                <div class="col-lg-4">
                    <div class="single-price-plan">
                        <h4>${abonnement.nom}</h4>
                        <div class="price-plan">
                            <h2>${abonnement.prix} <span>DT</span></h2>
                            <p>${abonnement.duree} mois</p>
                        </div>
                        <ul>
                            <li>Unlimited access to the gym</li>
                            <li>${i} classes per week</li>
                            ${i===9 ? '<li>Unlimited drinking package</li>' : ''}
                            ${abonnement.duree > 2 && i!=9 ? '<li>FREE drinking package</li>' : ''}
                            ${abonnement.duree === 1 ? '<del><li>FREE drinking package</li></del>' : ''}
                            <li>${i} Free personal training</li>
                        </ul>
                        <a href="addAbonnement.php?id_type_abo=${abonnement.id_type_abo}" class="primary-btn price-btn">Get Started</a>
                    </div>
                </div>
            `;
        });
    } else {
        abonnementsHTML = '<p class="no-abonnements">Aucun type d\'abonnement trouvé.</p>';
    }

    // Mettre à jour le contenu de abonnementsContainer avec le HTML généré
    abonnementsContainer.innerHTML = abonnementsHTML;
}

        });
    </script>   

</head>


<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="logo">
                <a href="./index.php">
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
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./gallery.php">Gallery</a></li>
                            <li><a href="./listPost.php">Forum</a>
                            <li> <a href="searchCours.php">Cours</a></li>
                               
                            </li>
                            <li><a href="../Compte.php">account</a>
                                <ul class="dropdown">
                                    <li><a href="../Compte.php">profil</a></li>
                                    <li><a href="../logout.php">log out</a></li>
                                </ul>
                            </li>
                             
                            <li><a href="./contact.html">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-item set-bg" data-setbg="img/hero-slider/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-text">
                                
                                <h1>FITNESS & SPORT</h1>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-item set-bg" data-setbg="img/hero-slider/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-text">
                               
                                <h1>FITNESS & SPORT</h1>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-item set-bg" data-setbg="img/hero-slider/hero-3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-text">
                                
                                <h1>FITNESS & SPORT</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Feature Section Begin -->
    <section class="feature-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item set-bg" data-setbg="img/feature/feature-1.jpg">
                        <h3>GROUP CLASSES</h3>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item set-bg" data-setbg="img/feature/feature-2.jpg">
                        <h3>PERSONAL TRAINING</h3>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item set-bg" data-setbg="img/feature/feature-3.jpg">
                        <h3>Sports Nutrition</h3>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section End -->

    <!-- About Section Begin -->
    <section class="home-about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <h2>WELCOME TO CROSSFIT</h2>
                        <p class="short-details">CrossFit is a cutting-edge functional fitness system that can help
                            everyday men.</p>
                        <p class="long-details">Success isn’t really that difficult. There is a significant portion of
                            the population here in North America, that actually want and need success to be hard! For
                            those of you who are serious about having more, doing more, giving more and being more.</p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="img/home-about.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Classes Section Begin -->
    <section class="classes-section">
        <div class="class-title set-bg" data-setbg="img/classes-title-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 m-auto text-center">
                        <div class="section-title pl-lg-4 pr-lg-4 pl-0 pr-0">
                            <h2>Choose Your Program</h2>
                            <p>Our Crossfit experts can help you discover new training techniques and exercises that offer a dynamic and efficient full-body workout.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="classes-item set-bg" data-setbg="img/classes/class-1.jpg">
                        <h4>Crossfit Level 1</h4>
                        <p>Sufferers around the globe will be happy to hear that there are sleep apnea remedies.</p>

                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="classes-item set-bg" data-setbg="img/classes/class-2.jpg">
                        <h4>BootCamp</h4>
                        <p>The oil, also called linseed oil, has many industrial uses – it is an important ingredient
                        </p>

                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="classes-item set-bg" data-setbg="img/classes/class-3.jpg">
                        <h4>Energy Blast</h4>
                        <p>It is a very common occurrence like cold or fever depending upon your lifestyle. </p>

                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="classes-item set-bg" data-setbg="img/classes/class-4.jpg">
                        <h4>CLASSIC BODY BALANCE</h4>
                        <p>The procedure is usually a preferred alternative to photorefractive keratectomy,</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Classes Section End -->


    <!-- Price Plan Section Begin -->
    <section class="price-section spad set-bg" data-setbg="img/price-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>CHOOSE YOUR PRICING PLAN</h2>
                        <p>Join our gym to boost your fitness, nurture your well-being, and invest in your health today!<br /></p>
                    </div>
                    <div class="toggle-option">
                        <ul>
                            <li>Monthly</li>
                            <li>
                                <label class="switch">
                                    <input id="toggle-checkbox" type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li>Years</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" id="abonnements-container">
                <?php if ($list->rowCount() > 0): $i =0;
                    foreach ($list as $abonnement):
                        $i = $i *2 +1;
                ?>
                <div class="col-lg-4">
                    <div class="single-price-plan">
                        <h4><?php echo $abonnement['nom']; ?></h4>
                        <div class="price-plan">
                            <h2><?php echo $abonnement['prix']; ?> <span>DT</span></h2>
                            <p><?php echo $abonnement['duree'] . ' mois'; ?></p>
                        </div>
                        <ul>
                            <li>Unlimited access to the gym</li>
                            <li><?php echo $i . " classes per week"; ?></li>
                            <?php if ($i > 2): ?>
                                <li>FREE drinking package</li>
                            <?php endif; ?>
                            <?php if ($i ==1): ?>
                                <del>
                                <li>FREE drinking package</li></del>
                            <?php endif; ?>
                            <li><?php echo $i . ' Free personal training'; ?></li>
                            
                        </ul>
                        <a href="addAbonnement.php?id_type_abo=<?php echo $abonnement['id_type_abo']?>" class="primary-btn price-btn">Get Started</a>
                    </div>
                </div>
                <?php 
                    endforeach; else: ?>
                    <p class="no-abonnements">Aucun type d'abonnement trouvÃ©.</p>
                <?php endif; ?>
            </div>

        </div>
    </section>
    <!-- Price Plan Section End -->

    

    <!-- Video Section Begin -->
    <section class="video-section set-bg" data-setbg="img/video-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <h2>Gym In Dowtown New York</h2>
                        <a href="https://www.youtube.com/watch?v=X_9VoqR5ojM" class="play-btn video-popup">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Section End -->

   <!-- Blog Section Begin -->
   <section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2> Our Events</h2>
                    <p>List of all news and events that take place related to us</p>
                </div>
            </div>
        </div>
        <div class="row blog-gird">
            <div class="grid-sizer"></div>
            <div class="col-lg-4 col-md-6 grid-item">
                <div class="blog-item large-item set-bg" data-setbg="img/blog/box.jpg">
                    <a href="#" class="blog-text">
                        <div class="categories">MARTIAL ART</div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 grid-item">
                <div class="blog-item small-item set-bg" data-setbg="img/blog/run.jpg">
                    <a href="#" class="blog-text">
                        <div class="categories">ATHLETICS</div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item">
                <div class="blog-item large-item xls-large set-bg" data-setbg="img/blog/blog-page-2.jpg">
                    <a href="#" class="blog-text">
                        <div class="categories">POWER</div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 grid-item">
                <div class="blog-item small-item set-bg" data-setbg="img/blog/blog-page-1.jpg">
                    <a href="#" class="blog-text">
                        <div class="categories">WEIGHT LIFTING</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<!-- Cta Section Begin -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-text">
                    <center><h3>Register Today</h3></center>
                </div>
                <center><a href=http://localhost/fitness-gym-web/View/Frontoffice/activitar-master/formulaire_event.php class="primary-btn cta-btn">Explore</a></center>
            </div>
        </div>
    </div>
</section>
<!-- Cta Section End -->

   <!-- Map Section Begin -->
   <div class="map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d486414.8942980452!2d9.78743776175034!3d36.7824592501291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd337f5e7ef543%3A0xd671924e714a0275!2sTunis!5e0!3m2!1sfr!2stn!4v1701886770245!5m2!1sfr!2stn"  height="590" style="border: 0" allowfullscreen=""></iframe>
</div>
<!-- Map Section End -->
   

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

                        <div class="footer-blog">
 
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">

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
</body>

</html>