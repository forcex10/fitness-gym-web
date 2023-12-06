<?php
include_once('C:\xampp\htdocs\fitness-gym-web\Controller\EventC.php');
include_once 'C:\xampp\htdocs\fitness-gym-web\Model\Event.php';
require_once 'C:/xampp/htdocs/fitness-gym-web/Controller/Type_eventC.php'; 

$type_eventC = new Type_eventC();  
$type_events = $type_eventC->listeType_event();
$eventController = new EventC();


if (isset($_POST['nom'], $_POST['local'], $_POST['date'], $_POST['temps'], $_POST['description'], $_POST['type_event'], $_FILES['image']['name'],$_POST['lat'],$_POST['lng'])) {
    if (!empty($_POST['nom']) && !empty($_POST['local']) && !empty($_POST['date']) && !empty($_POST['temps']) && !empty($_POST['description']) && !empty($_POST['type_event']) && !empty($_FILES['image']['name'])&& !empty($_POST['lat'])&& !empty($_POST['lng'])) {
        
        // Emplacement où vous souhaitez enregistrer les images téléchargées
        $uploadDirectory = 'C:\xampp\htdocs\fitness-gym-web\View\Backoffice\template\uploads\\';
        
        $event = new Event(
            null,
            $_POST['nom'],
            $_POST['local'],
            $_POST['date'],
            $_POST['temps'],
            $_POST['description'],
            $_POST['type_event'],
            $_FILES['image']['name'],
            $_POST['lat'],
            $_POST['lng'],
        );

        // Vérifier si le fichier a été correctement téléchargé
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
          $uploadedFileName = $uploadDirectory . basename($_FILES['image']['name']);
            
            // Enregistrement de l'image sur le serveur
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFileName)) {
                $event->setImage($uploadedFileName);

                // Enregistrement de l'événement dans la base de données
                $eventController->addEvent($event);

                // Redirection vers la liste des événements
                header("location:listeEvent.php");
                
            } else {
                echo 'Erreur lors de l\'enregistrement de l\'image sur le serveur.';
            }
        } else {
            echo 'Erreur lors du téléchargement du fichier.';
        }
    } else {
        $erreur = "Des informations sont manquantes.";
    }
}
?>




<html lang="en"><head>
 
  <style>
        /*
 * Always set the map height explicitly to define the size of the div element
 * that contains the map.
 */
#map {
  height: 100%;
}

/*
 * Optional: Makes the sample page fill the window.
 */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

    </style>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<link rel="stylesheet" type="text/css" href="./style.css" />
<script type="module" src="./index.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    
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

    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",
    q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,
    e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");
        for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyCSE5nNxd2Xwx2qI3KJNfrbXAFKlI0mcDg", v: "beta"});</script>

    <script>
        // Initialize and add the map
        let map;

        async function initMap() {
            const position = {
                lat: parseFloat(document.getElementById('lat').value) || -25.344, // Default latitude if not provided
                lng: parseFloat(document.getElementById('lng').value) || 131.031, // Default longitude if not provided
            };

            // Request needed libraries.
            // @ts-ignore
            const { Map } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

            // The map, centered at the provided or default location
            map = new Map(document.getElementById("map"), {
                zoom: 15,
                center: position,
                mapId: "DEMO_MAP_ID",
            });

            // The marker, positioned at the provided or default location
            const marker = new AdvancedMarkerView({
                map: map,
                position: position,
                title: "Event Location",
            });
        }

        // Call the initMap function when the page loads
        document.addEventListener('DOMContentLoaded', initMap);
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
        <li class="nav-item menu-items active">
          <a class="nav-link" href="index.html">
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
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Cours</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Categorie Cours</a></li>
              
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
          <div class="collapse show" id="abonnement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="ll.php">Abonnements</a></li>
          
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
              <li class="nav-item"> <a class="nav-link" href="http://localhost/fitness-gym-web/View/Backoffice/template/listeEvent.php">Evennements</a></li>
          
        </ul></div>
<div class="collapse" id="evennement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="http://localhost/fitness-gym-web/View/Backoffice/template/listeType_event.php">Type Evennements</a></li>
          
        </ul></div>
        <div class="collapse" id="evennement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="http://localhost/fitness-gym-web/View/Backoffice/template/searchEvent.php">Rechercher un Evenement</a></li>
          
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
   
          <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><i class="text-danger">Evénements</i></h4>
                  <h4 class="card-title" ><center>Ajouter Evenement</center></h4>
                                <div class="table-responsive">
                                    <body>
                                        <a  href="listeEvent.php"> Back to list </a>
                                        <hr>
                                        <div id="map"></div>
                                        <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="nom" class="text-light">Nom:</label>
                                                <input type="text" id="nom" name="nom" class="form-control text-light required" />
                                                <span id="erreurNom" class="error-message"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="local" class="text-light">Localisation:</label>
                                                <input type="text" id="local" name="local" class="form-control text-light" />
                                                <span id="erreurLocal" ></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="date" class="text-light">Date d'evennement:</label>
                                                <input type="date" id="date" name="date" class="form-control text-light"/>
                                                <span id="erreurDate" ></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="temps" class="text-light">temps d'evennement:</label>
                                                <input type="time" id="temps" name="temps" class="form-control text-light"/>
                                                <span id="erreurTemps" ></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="text-light">Description:</label>
                                                <input type="text" id="description" name="description" class="form-control text-light"/>
                                                <span id="erreurDescription"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="type_event" class="text-light" >Type_event:</label>
                                                <select id="type_event" name="type_event" class="form-control text-light">
                                                    <?php
                                                    foreach ($type_events as $type_event) {
                                                        echo '<option value="' . $type_event['idtype_event'] . '">' . $type_event['nom'] ;
                                                    }
                                                    ?>
                                                </select>
                                                <span id="erreurType_event" style="color: red"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="image">Poster:</label>
                                                <input type="file" id="image" name="image" class="form-control text-light"/>
                                                <span id="erreurImage"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="lat" class="text-light">Latitude:</label>
                                                <input type="float" id="lat" name="lat" class="form-control text-light"/>
                                                <span id="erreurLat"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="lng" class="text-light">Longitude:</label>
                                                <input type="float" id="lng" name="lng" class="form-control text-light"/>
                                                <span id="erreurLng"></span>
                                            </div>


                                            
                                            <input type="submit" value="Save" class="btn btn-primary me-2">
                                            <input type="reset" value="Reset" class="btn btn-outline-warning btn-icon-text" class="mdi mdi-reload btn-icon-prepend">
                                        </form>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                var form = document.querySelector('form');
                                                var nomInput = document.getElementById('nom');
                                                var erreurNom = document.getElementById('erreurNom');


                                                form.addEventListener('submit', function (event) {
                                                    // Vérifier si le champ "nom" est vide ou contient des chiffres
                                                    if (!/^[a-zA-Z]+$/.test(nomInput.value)) {
                                                        erreurNom.textContent = 'Le champ est vide ou contient des chiffres.';
                                                        erreurNom.style.color = 'red';
                                                        event.preventDefault(); // Empêcher l'envoi du formulaire
                                                    } else {
                                                        erreurNom.textContent = ''; // Effacer le message d'erreur s'il y en a un
                                                    }
                                                });
                                            });
                                        </script>
                                    </body>
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