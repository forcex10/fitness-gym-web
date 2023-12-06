<?php
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/AbonnementC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Model/Abonnement.php";
$TypeAbonnementC=new TypeAbonnementC();
$list = $TypeAbonnementC->listTypeAbonnement();
$abonnementC=new AbonnementC();
if (isset($_POST['username']) && isset($_POST['cour']) && isset($_POST['type']) && isset($_POST['methode']))
{
    if(!empty($_POST['username']) && !empty($_POST['cour']) && !empty($_POST['type']) && !empty($_POST['methode']))
    {
        $methode=$_POST['methode'];
        var_dump($methode);
        if($methode==='cb')
        {
            $abonnement=new Abonnement(null,$_POST['username'],$_POST['cour'],$_POST['type'],$_POST['methode'],$_POST['num_cb'],$_POST['titulaire_cb'],$_POST['exp_cb'],$_POST['cvv_cb'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

        }

        else if($methode==='visa')
        {
            $abonnement=new Abonnement(null,$_POST['username'],$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,$_POST['num_visa'],$_POST['titulaire_visa'],$_POST['exp_visa'],$_POST['cvv_visa'],NULL,NULL,NULL,NULL,NULL);

        }

        else if($methode==='mc')
        {
            $abonnement=new Abonnement(null,$_POST['username'],$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['num_mc'],$_POST['exp_mc'],$_POST['cvv_mc'],NULL,NULL);

        }
        else 
        {
            $abonnement=new Abonnement(null,$_POST['username'],$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['num_edinar'],$_POST['code_edinar']);


        }
        
        $abonnementC->addAbonnement($abonnement);
        header('Location:listeAbonnement.php');

    }
    
  
}

?>


<html lang="en"><head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fitness-gym</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png">
<style type="text/css" id="operaUserStyle"></style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>
<script>

        function afficherChampsCarte() {
            var methode = document.getElementById("methode").value;
            var champsCarte = document.querySelectorAll(".champ_carte");

            champsCarte.forEach(function(champ) {
                champ.style.display = "none";
            });

            if (methode === "cb") {
                document.getElementById("champ_cb").style.display = "block";
            } else if (methode === "visa") {
                document.getElementById("champ_visa").style.display = "block";
            } else if (methode === "mc") {
                document.getElementById("champ_mc").style.display = "block";
            }
            else if (methode === "edinar") {
                document.getElementById("champ_edinar").style.display = "block";
            }
            
            
        }

        document.addEventListener('DOMContentLoaded', function() {
        afficherChampsCarte();
    });
</script>
    

</head>
<body class="">
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner d-none d-flex" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
              <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&amp;utm_medium=banner&amp;utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo"></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo"></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                <span>Gold Member</span>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-primary"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-onepassword  text-info"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-calendar-today text-success"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items ">
          <a class="nav-link" href="everyfile.html">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="everyfile.html" aria-expanded="true" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Gestion Cours
</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Cours</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Categorie Cours</a></li>
              
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items active">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#abonnement" aria-expanded="false">                
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Gestion <br> Abonnements</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse show" id="abonnement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link active" href="listeAbonnement.php"> Abonnements</a></li>
              <li class="nav-item"> <a class="nav-link" href="listeTypeAbonnement.php">Gestion <br> Type Abonnements</a></li>
              <li class="nav-item"> <a class="nav-link" href="RechercheAbonnement.php">Recherche <br>Abonnements</a></li>
          
        </ul></div>
         </li>
        <li class="nav-item menu-items">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#produit" aria-expanded="false">                
           <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Gestion <br> Produits</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="produit" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Produits</a></li>
          
        </ul></div>
<div class="collapse" id="produit" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Types Produits</a></li>
          
        </ul></div></li>
        
        <li class="nav-item menu-items">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#evennement" aria-expanded="false">                
           <span class="menu-icon">
              <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Gestion <br> Evennements</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="evennement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Evennements</a></li>
          
        </ul></div>
<div class="collapse" id="evennement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Type Evennements</a></li>
          
        </ul></div></li>
        
        <li class="nav-item menu-items">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#forum" aria-expanded="false">                
          <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">Gestion <br> Forum</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="forum" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Posts</a></li>
          
        </ul></div>
<div class="collapse" id="forum" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Commentaires</a></li>
          
        </ul></div></li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#commande" aria-expanded="true">                
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Gestion <br> Commande</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="commande" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="listeCommande.php">Commande</a></li>
          
        </ul></div>
      </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo"></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <ul class="navbar-nav navbar-nav-right">
            
            
            
            
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Log out</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">Advanced settings</p>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <center>
            <div class="col-md-6 grid-margin stretch-card">
                    <div class="card" align="center">
                    <div class="card-body">
                        <h4 class="card-title">Ajout d'Abonnement</h4>
                        <br/>
                        <form class="forms-sample" action="" method="POST" onsubmit="return validerFormulaire()">
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label" >Username</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control text-light" id="username" name="username" placeholder="Username">
                            <label id="erreur_username" class="text-danger"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cour" class="col-sm-3 col-form-label">Cour</label>
                            <div class="col-sm-9">
                            <select id="cour" name="cour" class="form-control form-control-sm text-light" >
                                <option value="boxe">boxe </option>
                                <option value="musculation">musculation</option>
                                <option value="natation">natation</option>
                                <option value="gymnastic">gymnastic </option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label">Type d'Abonnement :</label>
                            <div class="col-sm-9">
                            <select id="type" name="type" class="form-control form-control-sm text-light" >
                            <?php
                                foreach($list as $l){
                                    echo '<option value="'.$l['id_type_abo'].'">'.$l['nom'].'('.$l['duree'] . ' mois ' . $l['prix'] .' DT )' ;
                                }
                            ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="methode" class="col-sm-3 col-form-label">Methode</label>
                            <div class="col-sm-9">
                            <select id="methode" name="methode" class="form-control form-control-sm text-light" onchange="afficherChampsCarte()" >
                                <option value="none">None</option>
                                <option value="cb" >Carte bancaire</option>
                                <option value="visa">Carte VISA</option>
                                <option value="mc">Master Card</option>
                                <option value="edinar">e-DINAR</option>
                            </select>
                            <label id="erreur_methode" class="text-danger" ></label>
                            </div>
                        </div>
                        <div class="form-group row champ_carte" id="champ_cb" >
                            <label for="num_cb" class="col-sm-3 col-form-label">Numéro de Carte :</label>
                            <div class="col-sm-9">
                            <input type="text" id="num_cb" name="num_cb"  class="form-control text-light">
                            <br/>
                            <label id="erreur_num_cb" class="text-danger" ></label></div>
                            <label for="titulaire_cb" class="col-sm-3 col-form-label" >Titulaire de la Carte:</label>
                            <div class="col-sm-9">
                            <input type="text" id="titulaire_cb" name="titulaire_cb"  class="form-control text-light">
                            <br/>
                            <label id="erreur_titulaire_cb" class="text-danger" ></label></div>
                            <label for="exp_cb" class="col-sm-3 col-form-label">Date d'expiration :</label>
                            <div class="col-sm-9">
                            <input type="text" id="exp_cb" name="exp_cb"  class="form-control text-light">
                            <br/>
                            <label id="erreur_exp_cb"  class="text-danger"></label></div>
                            <label for="cvv_cb" class="col-sm-3 col-form-label">Code CVV :</label>
                            <div class="col-sm-9">
                            <input type="text" id="cvv_cb" name="cvv_cb"  class="form-control text-light">
                            <br/>
                            <label id="erreur_cvv_cb" class="text-danger"></label></div>
                        </div>
                        <div class="form-group row champ_carte" id="champ_visa">
                                <label for="num_visa" class="col-sm-3 col-form-label">Numéro de Carte VISA :</label>
                                <div class="col-sm-9">
                                <input type="text" id="num_visa" name="num_visa"  class="form-control text-light">
                                <br/>
                                <label id="erreur_num_visa" class="text-danger" ></label></div>
                                <label for="titulaire_visa" class="col-sm-3 col-form-label" >Titulaire de la Carte  VISA:</label>
                                <div class="col-sm-9">
                                <input type="text" id="titulaire_visa" name="titulaire_visa"  class="form-control text-light">
                                <br/>
                                <label id="erreur_titulaire_visa" class="text-danger" ></label></div>
                                <label for="exp_visa" class="col-sm-3 col-form-label">Date d'expiration  VISA:</label>
                                <div class="col-sm-9">
                                <input type="text" id="exp_visa" name="exp_visa"  class="form-control text-light">
                                <br/>
                                <label id="erreur_exp_visa"  class="text-danger"></label></div>
                                <label for="cvv_visa" class="col-sm-3 col-form-label">Code CVV  VISA :</label>
                                <div class="col-sm-9">
                                <input type="text" id="cvv_visa" name="cvv_visa"  class="form-control text-light">
                                <br/>
                                <label id="erreur_cvv_visa" class="text-danger"></label></div>
                        </div>

                        <div class="form-group row champ_carte" id="champ_mc">
                                <label for="num_mc" class="col-sm-3 col-form-label">Numéro de la master Card  :</label>
                                <div class="col-sm-9">
                                <input type="text" id="num_mc" name="num_mc"  class="form-control text-light">
                                <br/>
                                <label id="erreur_num_mc" class="text-danger" ></label></div>
                                <label for="exp_mc" class="col-sm-3 col-form-label">Date d'expiration de la master Card :</label>
                                <div class="col-sm-9">
                                <input type="text" id="exp_mc" name="exp_mc"  class="form-control text-light">
                                <br/>
                                <label id="erreur_exp_mc"  class="text-danger"></label></div>
                                <label for="cvv_mc" class="col-sm-3 col-form-label">Code CVV de la master Card :</label>
                                <div class="col-sm-9">
                                <input type="text" id="cvv_mc" name="cvv_mc"  class="form-control text-light">
                                <br/>
                                <label id="erreur_cvv_mc" class="text-danger"></label></div>
                        </div>
                        <div class="form-group row champ_carte" id="champ_edinar">
                                <label for="num_edinar" class="col-sm-3 col-form-label">Numéro de la carte edinar  :</label>
                                <div class="col-sm-9">
                                <input type="text" id="num_edinar" name="num_edinar"  class="form-control text-light">
                                <br/>
                                <label id="erreur_num_edinar" class="text-danger" ></label></div>
                                <label for="code_edinar" class="col-sm-3 col-form-label">Code Secret :</label>
                                <div class="col-sm-9">
                                <input type="text" id="code_edinar" name="code_edinar"  class="form-control text-light">
                                <br/>
                                <label id="erreur_code_edinar" class="text-danger"></label></div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2"> Ajouter </button>
                        <a href="listeAbonnement.php" class="btn btn-dark">Annuler </a>
                        </form>
                    </div>
                    </div>
                </div><center>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->

<div class="jvectormap-tip"></div><div class="jvectormap-tip"></div><div class="jvectormap-tip"></div>
<script>

function validerFormulaire() {

// Vérification de l'ID et d'autres champs généraux
var id = document.getElementById("username").value;
var cour = document.getElementById("cour").value;
var type_abonnement = document.getElementById("type").value;
var erreur_username = document.getElementById("erreur_username");

if (id === "" || cour === "" || type_abonnement === "") {
    erreur_username.innerHTML="veillez saisir un nom d'utilisateur";
    return false;
}
else {
    erreur_username.innerHTML="";
}
var methode = document.getElementById("methode").value;
var champsCarte = document.querySelectorAll(".champ_carte");
var erreur_methode = document.getElementById("erreur_methode");

// Vérification si la méthode de paiement est sélectionnée
if (methode === "none") {
    erreur_methode.innerHTML="Veuillez sélectionner une méthode de paiement";
    return false; // Empêche l'envoi du formulaire si la méthode n'est pas choisie
}
else {
    erreur_methode.innerHTML="";
}

// Vérification des champs selon la méthode de paiement sélectionnée
if (methode === "cb") {
    var num_cb = document.getElementById("num_cb").value;
    var titulaire_cb = document.getElementById("titulaire_cb").value;
    var exp_cb = document.getElementById("exp_cb").value;
    var cvv_cb = document.getElementById("cvv_cb").value;
    var erreur_num_cb = document.getElementById("erreur_num_cb");
    var erreur_titulaire_cb = document.getElementById("erreur_titulaire_cb");
    var erreur_exp_cb = document.getElementById("erreur_exp_cb");
    var erreur_cvv_cb = document.getElementById("erreur_cvv_cb");


    if (!estEntier(num_cb) || num_cb<1000000000000000 || num_cb>9999999999999999 || !estEntier(cvv_cb) || cvv_cb<1000 || cvv_cb>9999 || !estMoisAnnee(exp_cb) || titulaire_cb === "") {
        if(!estEntier(num_cb) || num_cb<1000000000000000 || num_cb>9999999999999999){
            erreur_num_cb.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_cb.length + " chiffres"; return false;}
        else 
            erreur_num_cb.innerHTML="";

        if(!estEntier(cvv_cb) || cvv_cb<1000 || cvv_cb>9999 ){
            erreur_cvv_cb.innerHTML="Veuillez saisir un code de carte bancaire correct (4 chiffre )";return false;}
        else 
            erreur_cvv_cb.innerHTML="";
        if(!estMoisAnnee(exp_cb)){
            erreur_exp_cb.innerHTML="Veuillez saisir une date d'expiration correct de la carte bancaire (mm/aa) ";return false;}
        else 
            erreur_exp_cb.innerHTML="";
        if(titulaire_cb === ""){
            erreur_titulaire_cb.innerHTML="Veuillez saisir un titulaire de la carte bancaire ";return false;}
        else 
            erreur_titulaire_cb.innerHTML="";

        return false;
    }
} else if (methode === "visa") {
    var num_visa = document.getElementById("num_visa").value;
    var titulaire_visa = document.getElementById("titulaire_visa").value;
    var exp_visa = document.getElementById("exp_visa").value;
    var cvv_visa = document.getElementById("cvv_visa").value;
    var erreur_num_visa = document.getElementById("erreur_num_visa");
    var erreur_titulaire_visa = document.getElementById("erreur_titulaire_visa");
    var erreur_exp_visa = document.getElementById("erreur_exp_visa");
    var erreur_cvv_visa = document.getElementById("erreur_cvv_visa");

    if (!estEntier(num_visa) || num_visa<1000000000000000  || num_visa>9999999999999999 || !estEntier(cvv_visa) || cvv_visa<1000 || cvv_visa>9999 || !estMoisAnnee(exp_visa) || titulaire_visa === "") {
        if(!estEntier(num_visa) || num_visa<1000000000000000  || num_visa>9999999999999999){
            erreur_num_visa.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_visa.length + " chiffres";return false;}
        else 
            erreur_num_visa.innerHTML="";
        if(!estEntier(cvv_visa) || cvv_visa<1000 || cvv_visa>9999 ){
            erreur_cvv_visa.innerHTML="Veuillez saisir un code de carte VISA correct (4 chiffres )";return false;}
        else 
            erreur_cvv_visa.innerHTML="";
        if(!estMoisAnnee(exp_visa)){
            erreur_exp_visa.innerHTML="Veuillez saisir une date d'expiration correct de la carte VISA (mm/aa)";return false;}
        else 
            erreur_exp_visa.innerHTML="";
        if(titulaire_visa === ""){
            erreur_titulaire_visa.innerHTML="Veuillez saisir un titulaire de la carte VISA ";return false;}
        else 
            erreur_titulaire_visa.innerHTML="";
        return false;
    }
} else if (methode === "mc") {
    var num_mc = document.getElementById("num_mc").value;
    var exp_mc = document.getElementById("exp_mc").value;
    var cvv_mc = document.getElementById("cvv_mc").value;
    var erreur_num_mc = document.getElementById("erreur_num_mc");
    var erreur_exp_mc = document.getElementById("erreur_exp_mc");
    var erreur_cvv_mc = document.getElementById("erreur_cvv_mc");

    if (!estEntier(num_mc) || num_mc<1000000000000000 || num_mc>9999999999999999 || !estEntier(cvv_mc) || cvv_mc<1000 || cvv_mc>9999 || !estMoisAnnee(exp_mc)) {
        if(!estEntier(num_mc) || num_mc<1000000000000000 || num_mc>9999999999999999){
            erreur_num_mc.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_mc.length + " chiffres";return false;}
        else 
            erreur_num_mc.innerHTML="";
        if(!estEntier(cvv_mc) || cvv_mc<1000 || cvv_mc>9999 ){
            erreur_cvv_mc.innerHTML="Veuillez saisir un code de carte VISA correct (4 chiffres )";return false;}
        else 
            erreur_cvv_mc.innerHTML="";
        if(!estMoisAnnee(exp_mc)){
            erreur_exp_mc.innerHTML="Veuillez saisir une date d'expiration correct de la master carte (mm/aa)";return false;}
        else 
            erreur_exp_mc.innerHTML="";
        return false;
    }
} else if (methode === "edinar") {
    var num_edinar = document.getElementById("num_edinar").value;
    var code_edinar = document.getElementById("code_edinar").value;
    var erreur_num_edinar = document.getElementById("erreur_num_edinar");
    var erreur_code_edinar = document.getElementById("erreur_code_edinar");

    if (!estEntier(num_edinar) || !estEntier(code_edinar) || num_edinar<1000000000000000 || num_edinar>9999999999999999 || code_edinar<1000 || code_edinar>9999 ) {
        if(!estEntier(num_edinar) || num_edinar<1000000000000000 || num_edinar>9999999999999999){
            erreur_num_edinar.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_edinar.length + " chiffres";return false;}
        else 
            erreur_num_edinar.innerHTML="";
        if(!estEntier(code_edinar) || code_edinar<1000 || code_edinar>9999 ){
            erreur_code_edinar.innerHTML="Veuillez saisir un code de carte edinar correct (4 chiffres )";return false;}
        else 
            erreur_code_edinar.innerHTML="";
        return false;
    }
}



return true; // Envoi du formulaire si tout est correct
}

function estEntier(chaine) {
return /^\d+$/.test(chaine);
}

function estMoisAnnee(chaine) {
return /^(0[1-9]|1[0-2])\/\d{2}$/.test(chaine);
}


</script>

    

</body>

</html>