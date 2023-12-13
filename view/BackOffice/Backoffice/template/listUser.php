
<?php
session_start();

include_once '../../../../controller/reclamationC.php';
require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";
include "C:/xampp/htdocs/fitness-gym-web/Controller/CommandeC.php";
include "C:/xampp/htdocs/fitness-gym-web/Controller/typeC.php";
include "C:/xampp/htdocs/fitness-gym-web/Controller/produitC.php";
include "C:/xampp/htdocs/fitness-gym-web/model/produit.php";

    $produitC = new produitC();
    $tab = $produitC->listnotification();

$UserC= new UserC();
$list=$UserC->listClients();

$c = new reclamationC();
$tabe = $c->reclamation();
if(isset($_POST["tous"]) &&  !empty($_POST["tous"])){
   $c->deletereall();
   header("Location:listUser.php"); // Redirigez l'utilisateur après la suppression
   exit();


}
?>




<html lang="en"><head>
<style>
    .dropdown-divider.hide-divider {
    display: none;
}
    </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ACTIVITAR</title>
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
  <link rel="shortcut icon" href="assets/images/logo2.png">
</head>
<body class="">
<audio id="notificationSound" src="instagram_notificati.mp3" preload="auto"></audio>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner d-none d-flex" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          
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
      <a class="sidebar-brand brand-logo text-light "><strong>ACTIVITAR</strong></a>
        <a class="sidebar-brand brand-logo2" href="index.html"><img src="assets/images/logo2.png" alt="logo"></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="../../../FrontOffice/<?php echo $_SESSION['pdp'] ?>" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['nom']." ". $_SESSION['prenom']?></h5>
                <span>Gold Member</span>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <a href="profileAdmin.php" class="dropdown-item preview-item">
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
          <a class="nav-link" href="listUser.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Gestion Cours
</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="listcouri.php">Cours</a></li>
              <li class="nav-item"> <a class="nav-link" href="listtypecouri.php">Categorie Cours</a></li>
              
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#abonnement" aria-expanded="true">                
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Gestion <br> Abonnements</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse " id="abonnement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="listeAbonnement.php">Abonnements</a></li>
              <li class="nav-item"> <a class="nav-link" href="listeTypeAbonnement.php">Gestion <br> Type Abonnements</a></li>
          
        </ul></div></li>
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
              <li class="nav-item"> <a class="nav-link" href="produit.php">Produits</a></li>
              <li class="nav-item"> <a class="nav-link" href="tabletype.php">Types Produits</a></li>
                  
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
              <li class="nav-item"> <a class="nav-link" href="listeEvent.php">Evennements</a></li>
              <li class="nav-item"> <a class="nav-link" href="listeType_event.php">Type Evennements</a></li>
          
 
</ul>
              
          
</div></li>
        
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
              <li class="nav-item"> <a class="nav-link" href="listPost.php">Posts</a></li>
          
        </ul></div>
<div class="collapse" id="forum" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="listCom.php">Commentaires</a></li>
          
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
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <span class="menu-icon">
              <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="GestionUser.php"> clients </a></li>
              <li class="nav-item"> <a class="nav-link" href="listAdmin.php"> admins </a></li>
              <li class="nav-item"> <a class="nav-link" href="../../../FrontOffice/registerAdmin.php"> ajouter admin </a></li>
              <!-- <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li> -->
            </ul>
          </div>
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
          <li class="nav-item dropdown border-left">
    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <label class="mdi mdi-bell" id="notifi"></label>
        <span id="samir"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
        <h6 class="p-3 mb-0">Notifications</h6>
        <div class="dropdown-divider"></div>
        <?php foreach ($tab as $produit) { ?>
            <a class="dropdown-item preview-item" href="listeCommande.php">
                <div class="preview-thumbnail">
                    <img src="laatig.jpg" alt="Produit Image" class="rounded-circle profile-pic">
                </div>
                <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1"><?= " Id commande  : " . $produit['id_commande']; ?></p>
                </div>
            </a>
            <div class="dropdown-divider"></div>
        <?php } ?>
        <script type="text/javascript">
          var test=0;
          
    function loadDoc() {
        setInterval(function () {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("notifi").innerHTML = this.responseText;
                    var notificationCount = parseInt(this.responseText);
                    var samir = document.getElementById("samir");
                      if( document.getElementById("notifi").innerHTML>0 && test==0){
                      var playedDuringCurrentSession = false;
                    }
                      else {
                        var playedDuringCurrentSession = true;
                      }
                    if (!playedDuringCurrentSession) {
                        var notificationSound = document.getElementById("notificationSound");
                        notificationSound.volume = 1;
                        
                        playNotificationSound();
                        playedDuringCurrentSession = true;
                        test=1;
                       
                    } 

                    if (notificationCount > 0 ) {
                    
                       
                        samir.classList.add("count", "bg-danger");
                    } else {
                        samir.classList.remove("count", "bg-danger");
                    }
                }
            };

            xhttp.open("GET", "date.php", true);
            xhttp.send();
        }, 400);
    }

    function playNotificationSound() {
        var notificationSound = document.getElementById("notificationSound");
        if (isAutoplayAllowed(notificationSound)) {
            notificationSound.play();
        } else {
            document.addEventListener('click', function () {
                notificationSound.play();
            }, { once: true });
        }
    }

    function isAutoplayAllowed(audioElement) {
        var promise = audioElement.play();

        if (promise !== undefined) {
            promise.then(function () {
                return true;
            }).catch(function (error) {
                return false;
            });
        }

        return true;
    }

    function resetNotifications() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("notifi").innerHTML = "0";
                var samir = document.getElementById("samir");
                samir.classList.remove("count", "bg-danger");
                playedDuringCurrentSession = true;
                test=1;

                var previewItems = document.querySelectorAll(".dropdown-item.preview-item");
                previewItems.forEach(function (item) {
                    item.remove();
                });

                var dividers = document.querySelectorAll(".dropdown-divider");
                dividers.forEach(function (divider) {
                    divider.classList.add("hide-divider");
                });
            }
        };

        xhttp.open("GET", "reset_notifications.php", true);
        xhttp.send();
    }

    loadDoc();
</script>
        <a onclick="resetNotifications();" class="dropdown-item">Réinitialiser les notifications</a>
    </div>
</li>
            
            
            
            
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="../../../FrontOffice/<?php echo $_SESSION['pdp'] ?>" alt="">
                  <span class="count bg-success"></span>
                  <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['nom']." ". $_SESSION['prenom']?></p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
         
                <div class="dropdown-divider"></div>
                <a href="../../../FrontOffice/logout.php" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Log out</p>
                  </div>
                </a>
             
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
          
          <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0">$12.34</h3>
                        <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Potential growth</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0">$17.34</h3>
                        <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Revenue current</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0">$12.34</h3>
                        <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-danger">
                        <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Daily Income</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0">$31.53</h3>
                        <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Expense current</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <h4 class="card-title">Transaction History</h4>
                  <canvas id="transaction-history" class="transaction-chart chartjs-render-monitor" style="display: block; height: 238px; width: 484px;" width="453" height="223"></canvas>
                  <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                      <h6 class="mb-1">Transfer to Paypal</h6>
                      <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                      <h6 class="font-weight-bold mb-0">$236</h6>
                    </div>
                  </div>
                  <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                      <h6 class="mb-1">Tranfer to Stripe</h6>
                      <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                      <h6 class="font-weight-bold mb-0">$593</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title mb-1">Open Projects</h4>
                    <p class="text-muted mb-1">Your data status</p>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="preview-list">
                        <div class="preview-item border-bottom">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-primary">
                              <i class="mdi mdi-file-document"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">Admin dashboard design</h6>
                              <p class="text-muted mb-0">Broadcast web app mockup</p>
                            </div>
                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">15 minutes ago</p>
                              <p class="text-muted mb-0">30 tasks, 5 issues </p>
                            </div>
                          </div>
                        </div>
                        <div class="preview-item border-bottom">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                              <i class="mdi mdi-cloud-download"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">Wordpress Development</h6>
                              <p class="text-muted mb-0">Upload new design</p>
                            </div>
                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">1 hour ago</p>
                              <p class="text-muted mb-0">23 tasks, 5 issues </p>
                            </div>
                          </div>
                        </div>
                        <div class="preview-item border-bottom">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                              <i class="mdi mdi-clock"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">Project meeting</h6>
                              <p class="text-muted mb-0">New project discussion</p>
                            </div>
                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">35 minutes ago</p>
                              <p class="text-muted mb-0">15 tasks, 2 issues</p>
                            </div>
                          </div>
                        </div>
                        <div class="preview-item border-bottom">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                              <i class="mdi mdi-email-open"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">Broadcast Mail</h6>
                              <p class="text-muted mb-0">Sent release details to team</p>
                            </div>
                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">55 minutes ago</p>
                              <p class="text-muted mb-0">35 tasks, 7 issues </p>
                            </div>
                          </div>
                        </div>
                        <div class="preview-item">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-warning">
                              <i class="mdi mdi-chart-pie"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">UI Design</h6>
                              <p class="text-muted mb-0">New application planning</p>
                            </div>
                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">50 minutes ago</p>
                              <p class="text-muted mb-0">27 tasks, 4 issues </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Revenue</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0">$32123</h2>
                        <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                      </div>
                      <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                      <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Sales</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0">$45850</h2>
                        <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p>
                      </div>
                      <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                      <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Purchase</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0">$2039</h2>
                        <p class="text-danger ms-2 mb-0 font-weight-medium">-2.1% </p>
                      </div>
                      <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                      <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <div class="row">
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title">Messages</h4>
                    <form action="" method="POST">
                    <input type="submit" value="supprimer tous"  name="tous"    class="btn btn-outline-primary btn-fw">
</form>
                  </div>
                  <div class="preview-list">
                  <?php
        foreach ($tabe as $db) {
         // $pdpp=$UserC->retournerIMG($db['email']);
        ?>
                    <div class="preview-item border-bottom">
                      <div class="preview-thumbnail">
                        <img src="../../../FrontOffice/<?php echo $pdpp ?>" alt="image" class="rounded-circle">
                      </div>
                      <div class="preview-item-content d-flex flex-grow">
                        <div class="flex-grow">
                          <div class="d-flex d-md-block d-xl-flex justify-content-between">
                            <h6 class="preview-subject"><?= $db['nom']; ?></h6>

                            <a href="mailto:<?php echo $db['email'];?> " class="reply" >Repondre</a>
                            <a  href="deletereclamation.php?id=<?= $db['id_reclamation']; ?> " class="delete"> supprimer </a>

                          </div>

                          <p class="text-muted"><?= $db['email']; ?></p>
                          <p class="text-muted"><?= $db['messgae']; ?></p>
                        </div>
                      </div>
                    </div>
                    <?php
        }
        ?>



                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Portfolio Slide</h4>
                  <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel owl-loaded owl-drag" id="owl-carousel-basic">
                    
                    
                    
                  <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3360px, 0px, 0px); transition: all 0.25s ease 0s; width: 11915px;"><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/img_6.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/img_6.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/img_6.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Rectangle.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Rectangle.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Rectangle.jpg" alt="">
                    </div></div><div class="owl-item active" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/img_6.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/img_6.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/img_6.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Rectangle.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Rectangle.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Rectangle.jpg" alt="">
                    </div></div><div class="owl-item cloned" style="width: 295.5px; margin-right: 10px;"><div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="mdi mdi-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="mdi mdi-chevron-right"></i></button></div><div class="owl-dots disabled"></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="mdi mdi-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="mdi mdi-chevron-right"></i></button></div><div class="owl-dots disabled"></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="mdi mdi-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="mdi mdi-chevron-right"></i></button></div><div class="owl-dots disabled"></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="mdi mdi-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="mdi mdi-chevron-right"></i></button></div><div class="owl-dots disabled"></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="mdi mdi-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="mdi mdi-chevron-right"></i></button></div><div class="owl-dots disabled"></div></div>
                  <div class="d-flex py-4">
                    <div class="preview-list w-100">
                      <div class="preview-item p-0">
                        <div class="preview-thumbnail">
                          <img src="assets/images/faces/face12.jpg" class="rounded-circle" alt="">
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject">CeeCee Bass</h6>
                              <p class="text-muted text-small">4 Hours Ago</p>
                            </div>
                            <p class="text-muted">Well, it seems to be working now.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted">Well, it seems to be working now. </p>
                  <div class="progress progress-md portfolio-progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">To do list</h4>
                  <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                    <button class="add btn btn-primary todo-list-add-btn">Add</button>
                  </div>
                  <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                      <li>
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Create invoice <i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i></label>
                        </div>
                        <i class="remove mdi mdi-close-box"></i>
                      </li>
                      <li>
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Meeting with Alita <i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i></label>
                        </div>
                        <i class="remove mdi mdi-close-box"></i>
                      </li>
                      <li class="completed">
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox" checked=""> Prepare for presentation <i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i></label>
                        </div>
                        <i class="remove mdi mdi-close-box"></i>
                      </li>
                      <li>
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Plan weekend outing <i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i></label>
                        </div>
                        <i class="remove mdi mdi-close-box"></i>
                      </li>
                      <li>
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Pick up kids from school <i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i></label>
                        </div>
                        <i class="remove mdi mdi-close-box"></i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Visitors by Countries</h4>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-us"></i>
                              </td>
                              <td>USA</td>
                              <td class="text-right"> 1500 </td>
                              <td class="text-right font-weight-medium"> 56.35% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-de"></i>
                              </td>
                              <td>Germany</td>
                              <td class="text-right"> 800 </td>
                              <td class="text-right font-weight-medium"> 33.25% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-au"></i>
                              </td>
                              <td>Australia</td>
                              <td class="text-right"> 760 </td>
                              <td class="text-right font-weight-medium"> 15.45% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-gb"></i>
                              </td>
                              <td>United Kingdom</td>
                              <td class="text-right"> 450 </td>
                              <td class="text-right font-weight-medium"> 25.00% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-ro"></i>
                              </td>
                              <td>Romania</td>
                              <td class="text-right"> 620 </td>
                              <td class="text-right font-weight-medium"> 10.25% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-br"></i>
                              </td>
                              <td>Brasil</td>
                              <td class="text-right"> 230 </td>
                              <td class="text-right font-weight-medium"> 75.00% </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
          </div>
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

<div class="jvectormap-tip"></div><div class="jvectormap-tip"></div><div class="jvectormap-tip"></div><div class="jvectormap-tip"></div><div class="jvectormap-tip"></div></body></html>