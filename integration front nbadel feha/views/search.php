<?php 
require_once "../controller/PostC.php";
$postc = new PostC();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["post"]) && isset($_POST["search"])) {
        $idpost = $_POST["post"];
        $list = $postc->affichercom($idpost);
    }
}

$post = $postc->afficherpost();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
<style>
  
  .blog-single-section {
        background-color: #f2f2f2;
        /* Autres styles ici */
    }


    /* Styles généraux du tableau */
.table-responsive {
  /* Vos styles pour le conteneur du tableau ici */
}

/* Styles pour l'en-tête du tableau */
table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
  /* Autres styles de base pour le tableau */
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
  color: black;
  
  /* Autres styles pour les cellules du tableau */
}

/* Styles spécifiques aux éléments du tableau */

.post-image {
  /* Styles pour les images dans la colonne 'Image' */
  max-width: 200px;
  max-height: 200px;
  width: auto;
  height: auto;
  /* Autres styles pour les images */
}

.options-buttons {
  /* Styles pour les boutons d'options dans la colonne 'Options' */
  display: flex;
  flex-direction: column;
  /* Autres styles pour les boutons */
}

    .post-textarea {
        width: 100%; /* La zone de texte occupera toute la largeur disponible */
        max-width: 100%; /* Assurez-vous qu'elle ne dépasse pas la largeur de son contenant */
        min-height: 100px; /* Définissez une hauteur minimale pour la zone de texte */
        resize: vertical;
        background-color: black; /* Permet à l'utilisateur de redimensionner verticalement si nécessaire */
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
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4><br><br>
                            <a href="listCom.php" class="btn btn-info btn-fw">Revenir</a>
                            <center>
                                <form action="" method="POST">
                                    <label for="post">Sélectionner un post :</label>
                                    <select name="post" id="post">
                                        <?php foreach ($post as $posts) { ?>
                                            <option value="<?= $posts['idpost'] ?>" <?php if (isset($_POST['post']) && $_POST['post'] == $posts['idpost']) echo 'selected'; ?>>
                                                <div class="custom-option">
                                                    <span class="label">Nom :</span>
                                                    <span class="value"><?= $posts['nom'] ?></span>
                                                    <span class="separator"> || </span>
                                                    <span class="label">prenom :</span>
                                                    <span class="value"><?= $posts['prenom'] ?></span>
                                                    <span class="separator"> || </span>
                                                    <span class="label">post:</span>
                                                    <span class="value"><?= $posts['contenu'] ?></span>
                                                </div>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <input type="submit" class="btn btn-info btn-fw" value="Rechercher" name="search"><br><br><br><br><br><br>
                                </form>
                            </center>

                            <div class="table-responsive">
                                <center>
                                    <table>
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($list)) { ?>
                                                <h2>commentaires correspendants au post:</h2><br>
                                                <table>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>prenom</th>
                                                        <th>commentaire</th>
                                                    </tr>
                                                    <?php foreach ($list as $commentaire) { ?>
                                                        <tr>
                                                            <td><?= $commentaire['nom'] ?></td>
                                                            <td><?= $commentaire['prenom'] ?></td>
                                                            <td><?= $commentaire['contenu'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                        </div>
                    </div>
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







     

       


