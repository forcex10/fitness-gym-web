

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
    
?>

<?php


include '../../../controller/ComC.php';
include '../../../model/Com.php';
include '../../../model/Post.php';
require_once('verif.php');
$error = "";
$comC = new ComC();
// create client
$com = null;

// create an instance of the controller
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["contenu"])&&
    isset($_POST["img"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["contenu"])&&
        //!empty($_POST["img"])&&
       
       
        validerContenu($_POST["contenu"])
    ) {
        // Ajouter la date actuelle
        $date = date("Y-m-d");
   
        $com = new Com(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['contenu'],
            $_POST['img'],
            $date,
            $_GET['idpost'],
        );
        $comC->addcom($com);
        header("Location: listCom.php?idpost={$_GET['idpost']}");
        exit;
    } else {
        $error = "Informations manquantes ou invalides";

// Affichage d'une alerte avec le message d'erreur
echo "<script>alert('" . $error . "');</script>";
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
    <section class="blog-single-hero set-bg" data-setbg="img/blog-single-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 m-auto text-center">
                    <div class="bs-hero-text">
                        <div class="blog-title">
                            <h3 style="color: white;">Votre participation est cruciale pour rendre ce forum dynamique et utile pour chacun. N'hésitez pas à partager vos expériences et conseils pour motiver les autres membres. Assurons-nous simplement que nos échanges restent respectueux.</h3>
                        </div><br><br>
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
                <div class="col-lg-12">
                    <div class="leave-comment-form">
                    <li><a href="listPost.php">retour a la liste de postes</a></li><br><br>
                        <form action="" method="POST" id="monFormulaire">
                            <div class="row">
                                <div class="col-lg-4">
                                <input type="text" id="nom" placeholder="nom" name="nom" value= " <?php echo $_SESSION['nom'];?>" readonly/>
                                <span id="erreurNom" style="color: red"></span>
                                </div>
                                <div class="col-lg-4">
                                <input type="text" id="prenom" placeholder="prenom" name="prenom" value= " <?php echo $_SESSION['prenom'];?>" readonly />
                                <span id="erreurPrenom" style="color: red"></span>
                                </div>
                                <div class="col-lg-4">
                                <input type="text" id="email" placeholder="email" name="email" value="<?php echo $_SESSION['email'];?>" readonly/>
                                <span id="erreurEmail" style="color: red"></span>
                                </div>
                                <div class="col-lg-12">
                                <textarea type="text" placeholder="contenu" id="contenu" name="contenu" rows="50" cols="50" ></textarea>
                                <span id="erreurcontenu" style="color: red"></span>
                                </div>
                                <div class="col-lg-4">
                        <label for="img"style="color: white">image</label>
                        <input type="file"  id="img" name="img">
                      </div>
                            </div>
                            <button type="submit" class="leave-btn">Submit</button>
                      <button class="leave-btn" type="reset">reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Single Section End -->

    <script src="controle de saisie.js"></script> 





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



