


<?php

include '../controller/PostC.php';
include '../model/Post.php';
require_once('verif.php');
$error = "";
$postC = new PostC();

// create client
$post = null;

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
        validerNom($_POST["nom"]) &&
        validerPrenom($_POST["prenom"]) &&
        validerEmail($_POST["email"])
    ) {
        $post = new Post(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['contenu'],
            $_POST['img'] 
        );
        $postC->addpost($post);
        header('Location:listPost.php');
        exit;
    } else {
        $error = "Informations manquantes ou invalides";

// Affichage d'une alerte avec le message d'erreur
echo "<script>alert('" . $error . "');</script>";
    }
}

?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en" class="u-responsive-lg"><head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Empire State Building, Contact Us">
  <meta name="description" content="">
  <title>Forum</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Forum.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 5.21.3, nicepage.com">
  <meta name="referrer" content="origin">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  
  
  
  <script type="application/ld+json">{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "",
  "logo": "images/default-logo.png"
}</script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Forum">
  <meta property="og:type" content="website">
<meta data-intl-tel-input-cdn-path="intlTelInput/"><style type="text/css" id="operaUserStyle"></style>   </script></head>
<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-header" id="sec-d798"><div class="u-clearfix u-sheet u-sheet-1">
      <a href="https://nicepage.com" class="u-image u-logo u-image-1">
        <img src="images/default-logo.png" class="u-logo-image u-logo-image-1">
      </a>
      <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
        <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
          <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
            <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
          </a>
        </div>
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Acceuil.html" style="padding: 10px 20px;">Acceuil</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Cours.html" style="padding: 10px 20px;">Cours</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Coachs.html" style="padding: 10px 20px;">Coachs</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Materiaux.html" style="padding: 10px 20px;">Matériaux</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Produit.html" style="padding: 10px 20px;">Produits</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Event.html" style="padding: 10px 20px;">Evénnements</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html" style="padding: 10px 20px;">Contact</a>
</li></ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Acceuil.html">Acceuil</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Cours.html">Cours</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Coachs.html">Coachs</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Materiaux.html">Matériaux</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Produit.html">Produits</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Event.html">Evénnements</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.html">Contact</a>
</li></ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      <style class="offcanvas-style">            .u-offcanvas .u-sidenav { flex-basis: 250px !important; }            .u-offcanvas:not(.u-menu-open-right) .u-sidenav { margin-left: -250px; }            .u-offcanvas.u-menu-open-right .u-sidenav { margin-right: -250px; }            @keyframes menu-shift-left    { from { left: 0;        } to { left: 250px;  } }            @keyframes menu-unshift-left  { from { left: 250px;  } to { left: 0;        } }            @keyframes menu-shift-right   { from { right: 0;       } to { right: 250px; } }            @keyframes menu-unshift-right { from { right: 250px; } to { right: 0;       } }            </style></nav>
      <img class="u-image u-image-contain u-image-default u-image-2" src="images/prsentation.png" alt="" data-image-width="846" data-image-height="433">
    </div></header>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post </title>
</head>

<body>
<button><a href="listPost.php">retour au forum</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" id="monFormulaire">
        
        <table border="0" align="center" >
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom :</label></td>
                <td>
                    <input type="text" id="prenom" name="prenom" />
                    <span id="erreurPrenom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td>
                    <input type="text" id="email" name="email" />
                    <span id="erreurEmail" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="contenu">post :</label></td>
                <td>
                <textarea id="contenu" name="contenu" rows="10" cols="50" ></textarea>
                    <span id="erreurcontenu" style="color: red"></span>
                </td>
            </tr>
            <tr>
    <td><label for="img">Image :</label></td>
    <td>
        <input type="file" id="img" name="img" accept="image/*" />
        <span id="erreurImg" style="color: red"></span>
    </td>
</tr>
            


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>
    </form>
    <script src="controle de saisie.js"></script> 
</body>
<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-a4cc"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1"> <p>Vous pouvez nous contacter sur <a href="mailto:fitness_gym@gmail.com">fitness_gym@gmail.com</a></p>
      </div></footer>
</html>
