<?php
session_start();
require 'C:\xampp\htdocs\fitness-gym-web\Controller\EventC.php';
require 'C:\xampp\htdocs\fitness-gym-web\Model\Event.php';

require_once 'C:/xampp/htdocs/fitness-gym-web/Controller/Type_eventC.php'; 

$type_eventC = new Type_eventC();  
$type_events = $type_eventC->listeType_event();

// create an instance of the controller
$eventC = new EventC();
$error = "";

if (isset($_POST["nom"]) && isset($_POST["local"]) && isset($_POST["date"]) && isset($_POST["temps"]) && isset($_POST["description"]) && isset($_POST["type_event"]) && isset($_POST["lat"]) && isset($_POST["lng"])) {
    if (!empty($_POST['nom']) && !empty($_POST["local"]) && !empty($_POST["date"]) && !empty($_POST["temps"]) && !empty($_POST["description"]) && !empty($_POST["type_event"]) && !empty($_POST["lat"]) && !empty($_POST["lng"])) {

        // Check for file upload success
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            // Move uploaded file to the specified directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                // Update the event's image attribute in the database
                $eventC->updateEventImage($_POST['idevent'], $_FILES['image']['name']);
                echo "The image has been uploaded and updated successfully.";
            } else {
                echo "Error uploading the image.";
            }
        }

        // Create/update the event
        $event = new Event(null, $_POST['nom'], $_POST['local'], $_POST['date'], $_POST['temps'], $_POST['description'], $_POST['type_event'], isset($_FILES['image']) ? $_FILES['image']['name'] : null, $_POST['lat'], $_POST['lng']);
        var_dump($event);

        $eventC->updateEvent($event, $_POST['idevent']);

        header('Location:listeEvent.php');
    } else {
        $error = "Missing information";
    }
}
?>




<html lang="en"><head>
 
<head>
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
      <a class="sidebar-brand brand-logo text-light "><strong>ACTIVITAR</strong></a>
        <a class="sidebar-brand brand-logo2" href="listeUser.php"><img src="assets/images/logo2.png" alt="logo"></a>
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
        <li class="nav-item menu-items active">
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
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Produits</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Types Produits</a></li>
                  
        </ul></div></li>
         
        <li class="nav-item menu-items">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#evennement" aria-expanded="false">                
           <span class="menu-icon">
              <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Gestion <br> Evénements</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="evennement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="listeEvent.php">Evénements</a></li>
              <li class="nav-item"> <a class="nav-link" href="listeType_event.php">Type Evénements</a></li>
          
 
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
            
            
            
            
            <li class="nav-item dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="../../../FrontOffice/<?php echo $_SESSION['pdp'] ?>" alt="">
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
                  <h2 class="text-warning" class="card-title" ><center>Update Evénements</center></h2>
                  <center><button class="btn btn-info btn-fw"><a class="text-light" href="listeEvent.php">Back to list</a></button></center>
                  <br><br>
                                <div class="table-responsive">
                                <body>                  
                                    <div id="form-container">
                                       
                                        <hr>

                                        <div id="error">
                                            <?php echo $error; ?>
                                        </div>

                                        <?php if (isset($_POST['idevent'])) {
                                            $event = $eventC->showEvent($_POST['idevent']);
                                        ?>

                                            <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                                                
                                                  <div class="form-group">
                                                        
                                                        
                                                            <input type="hidden" id="idevent" name="idevent" class="form-control" value="<?php echo isset($_POST['idevent']) ? $_POST['idevent'] : ''; ?>" readonly />

                                                            </div>        
                                                  <div class="form-group">
                                                        <label for="nom" class="text-info">Nom:</label>
                                                        
                                                            <input type="text" id="nom" name="nom" class="form-control text-light" value="<?php echo $event['nom'] ?>" />
                                                            <span id="erreurNom" style="color: red"></span>
                                                  </div>    
                                                  <br><br>
                                                  <div class="form-group">  
                                                        <label for="local" class="text-info">Localisation:</label>
                                                        
                                                            <input type="text" id="local" name="local" class="form-control text-light" value="<?php echo $event['local'] ?>" />
                                                            <span id="erreurLocal" style="color: red"></span>
                                                            </div>
                                                            <br><br>       
                                                  <div class="form-group">
                                                        <label for="date" class="text-info">Date:</label>
                                                        
                                                            <input type="date" id="date" name="date" class="form-control text-light" value="<?php echo $event['date'] ?>" />
                                                            <span id="erreurDate" style="color: red"></span>
                                                            </div>
                                                            <br><br>     
                                                  <div class="form-group">
                                                        <label for="temps" class="text-info">Horaire:</label>
                                                        
                                                            <input type="time" id="temps" name="temps" class="form-control text-light" value="<?php echo $event['temps'] ?>" />
                                                            <span id="erreurDate" style="color: red"></span>
                                                            </div>
                                                            <br><br>   
                                                  <div class="form-group">
                                                        <label for="description" class="text-info">Description:</label>
                                                        
                                                            <input type="text" id="description" name="description" class="form-control text-light" value="<?php echo $event['description'] ?>" />
                                                            <span id="erreurDescription" style="color: red"></span>
                                                            </div>   
                                                            <br><br>
                                                  <div class="form-group">
                                                        <label for="type_event" class="text-info">Type:</label>
                                                        
                                                            <select id="type_event" name="type_event" class="form-control text-light" required>
                                                                <?php
                                                                foreach ($type_events as $type_event) {
                                                                    $selected = ($type_event['idtype_event'] == $event['type_event']) ? 'selected' : '';
                                                                    echo '<option value="' . $type_event['idtype_event'] . '" ' . $selected . '>' . $type_event['nom'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span id="erreur_type_event" style="color: red"></span>
                                                        
                                                            </div> 
                                                            <br><br>

                                                            <div class="form-group">
                                                                <label for="image" class="text-info">Poster:</label>
                                                                <input type="file" id="image" name="image" class="form-control text-light" />
                                                                <span id="erreurImage" style="color: red"></span>
                                                            </div>
                                                            <br><br>


                                                        <div class="form-group">
                                                        <label for="lat" class="text-info">Latitude:</label>
                                                        
                                                            <input type="float" id="lat" name="lat" class="form-control text-light" value="<?php echo $event['lat'] ?>" />
                                                            <span id="erreurLat" style="color: red"></span>
                                                            </div>   
                                                                <br><br>
                                                        <div class="form-group">
                                                        <label for="lng" class="text-info">Longitude:</label>
                                                        
                                                            <input type="float" id="lng" name="lng" class="form-control text-light" value="<?php echo $event['lng'] ?>" />
                                                            <span id="erreurLng" style="color: red"></span>
                                                            </div>   
                                                        <br><br>
                                                            <center><input type="submit" value="Save" class="btn btn-outline-primary btn-icon-text" class="mdi mdi-file-check btn-icon-prepend">
                                                        
                                                        
                                                            <input type="reset" value="Reset" class="btn btn-outline-warning btn-icon-text" class="mdi mdi-reload btn-icon-prepend"></center>
                                                        
                                                  
                                            </form>
                                        <?php } ?>
                                    </div>
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