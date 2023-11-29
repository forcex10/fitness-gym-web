<?php

include "../controller/ComC.php";

$c = new ComC();
$tab = $c->listcom();

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
                            <li><a href="./index.html">Home</a></li>
                            <li><a href="./about-us.html">About us</a></li>
                            <li><a href="./schedule.html">Schedule</a></li>
                            <li><a href="./gallery.html">Gallery</a></li>
                            <li class="active"><a href="./blog.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="./about-us.html">About Us</a></li>
                                    <li><a href="./blog-single.html">Blog Details</a></li>
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

    <!-- Breadcrumb Section Begin -->
    <section class="blog-single-hero set-bg" data-setbg="img/blog-single-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 m-auto text-center">
                    <div class="bs-hero-text">
                        <div class="blog-title">
                            <h3 style="color: white;">Votre participation est cruciale pour rendre ce forum dynamique et utile pour chacun. N'hésitez pas à partager vos expériences et conseils pour motiver les autres membres. Assurons-nous simplement que nos échanges restent respectueux.</h3>
                        </div><br>
                        <center>
                        <form method="GET" action="listPost.php" style="margin: 0;">
    <input type="hidden" value="<?= $post['idpost']; ?>" name="idpost">
    <button type="submit" class="btn btn-info btn-fw" name="retour au forum">retour au forum</button>
    </form><br><br><br><br>
    

    <form method="GET" action="search.php" style="margin: 0;">
    <input type="hidden" value="<?= $post['idpost']; ?>" name="idpost">
    <button type="submit" class="btn btn-warning btn-fw" name="afficher commentaires par post">afficher les commentaires de chqaue post</button>
    </form><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Blog Single Section Begin -->
    <section class="blog-single-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="blog-single-text">
        <?php foreach ($tab as $com) { ?>
    <div style="border-bottom: 1px solid #ccc; padding-bottom: 20px; margin-bottom: 20px;">
        <h3 style="color: white;">
            commenté par : <?= $com['nom']; ?> <?= $com['prenom']; ?><br>
            Date d'ajout : <?= date("Y-m-d"); ?>
        </h3><br>

        <div class="blog-pic">
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?= $com['img']; ?>" alt="">
                </div>
                <div class="col-lg-6">
                    <img src="" alt="">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="blog-more-title">
            <p><?= $com['contenu']; ?></p>
        </div>

        <!-- Boutons Modifier, Supprimer, Commenter -->
        <div class="row">
            <div class="col-md-4 mb-2">
            <form method="GET" action="updateCom.php">
                    <button type="submit" class="btn btn-warning btn-fw" >modifier</button>
                    <input type="hidden" value="<?= $com['idcom']; ?>" name="idcom">
                    <input type="hidden" value="<?= $com['postFK']; ?>" name="postFK">

                </form>
            </div>
            <div class="col-md-4 mb-2">
            <form method="GET" action="deleteCom.php" style="margin: 0;">
                    <input type="hidden" value="<?= $com['idcom']; ?>" name="idcom">
                    <button type="submit" class="btn btn-danger btn-fw" >supprimer</button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>


                        <div class="blog-tag-share">
                            <div class="tags">
                            </div>
                            <div class="social-share">
                                <span>Share:</span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-single-sidebar">
                        <div class="bs-latest-news">
                            <h4>News Latest</h4>
                            <a href="#" class="bl-item set-bg" data-setbg="img/sidebar-latest.jpg">
                                <h5>Nous avons tous ces moments dans notre vie où nous ressentons.</h5>
                                <span>31 janvier 2019</span>
                            </a>
                            <a href="#" class="bl-item set-bg" data-setbg="img/sidebar-latest.jpg">
                                <h5>Trouver l'outil d'apprentissage parfait pour Flash est une tâche ardue pour tout novice</h5>
                                <span>31 janvier 2019</span>
                            </a>
                            <a href="#" class="bl-item set-bg" data-setbg="img/sidebar-latest.jpg">
                                <h5>L’achat de téléviseurs grand écran a explosé ces derniers temps. </h5>
                                <span>31 janvier 2019</span>
                            </a>
                            <a href="#" class="bl-item set-bg" data-setbg="img/sidebar-latest.jpg">
                                <h5>Les calculs rénaux sont des dépôts minéraux très durs qui se produisent.</h5>
                                <span>31 janvier 2019</span>
                            </a>
                        </div>
                        <div class="bs-recent-news">
                            <h4>Recent News</h4>
                            <a href="#" class="br-item">
                                <div class="bi-pic">
                                    <img src="img/br-recent-1.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <span>Jan 31, 2019</span>
                                    <h5>Easy Home Remedy For Moisture Control Of Skin</h5>
                                </div>
                            </a>
                            <a href="#" class="br-item">
                                <div class="bi-pic">
                                    <img src="img/br-recent-2.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <span>Jan 31, 2019</span>
                                    <h5>Turkey Gravy Secrets Revealed</h5>
                                </div>
                            </a>
                            <a href="#" class="br-item">
                                <div class="bi-pic">
                                    <img src="img/br-recent-3.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <span>Jan 31, 2019</span>
                                    <h5>How To Remove Kidney Stones</h5>
                                </div>
                            </a>
                            <a href="#" class="br-item">
                                <div class="bi-pic">
                                    <img src="img/br-recent-4.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <span>Jan 31, 2019</span>
                                    <h5>Help Finding Information Online</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-news">
                        <h4>Relatest News</h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="recent-item set-bg" data-setbg="img/recent-1.jpg">
                                    <a href="#" class="recent-text">
                                        <div class="categories">Gym & Croosfit</div>
                                        <h5>Many people sign up for affiliate programs</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="recent-item set-bg" data-setbg="img/recent-2.jpg">
                                    <a href="#" class="recent-text">
                                        <div class="categories">Gym & Croosfit</div>
                                        <h5>Many people sign up for affiliate programs</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="recent-item set-bg" data-setbg="img/recent-3.jpg">
                                    <a href="#" class="recent-text">
                                        <div class="categories">Gym & Croosfit</div>
                                        <h5>Many people sign up for affiliate programs</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Single Section End -->

    <!-- Cta Section Begin -->
    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-text">
                        <h3>GeT Started Today</h3>
                        <p>New student special! $30 unlimited Gym for the first week anh 50% of our member!</p>
                    </div>
                    <a href="#" class="primary-btn cta-btn">book now</a>
                </div>
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
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
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


