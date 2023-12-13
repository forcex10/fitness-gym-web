<?php
session_start();
include_once "../../../../controller/typeC.php";
include_once '../../../../controller/produitC.php';
include_once '../../../../model/produit.php';
include_once 'veriff.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$error = "";
$typec = new typeC();
// create client
$produit = null;
$msg="";
// create an instance of the controller
$produitC = new produitC();
if(isset($_POST["save"])){
    $target = "images/" . basename($_FILES['image']['name']);
    $image=$_FILES['image']['name'];

}


if (
    isset($_POST["productname"]) &&
    isset($_POST["productdescription"]) &&
    isset($_POST["productprice"]) &&
    isset($_POST["productstock"])&&
    isset($_POST["type"])
) {
    if (
        !empty($_POST["productname"]) &&
        !empty($_POST["productdescription"]) &&
        !empty($_POST["productprice"]) &&  !empty($_POST["type"]) &&
        !empty($_POST["productstock"])&& validerNom($_POST["productname"]) && validerDescription($_POST["productdescription"])  && validerPrix( $_POST["productprice"],1000) && validerQuantite($_POST["productstock"], 1000) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $produit = new produit(
          null,
            $_POST["productname"],
            $_POST["productdescription"],
            $_POST["productprice"],
            $_POST["productstock"],
            $_POST["type"],
            $image
        );
        //var_dump($produit);
        
        $produitC->updateproduit($produit, $_POST['id']);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            $msg="Image uploaded successfully";
            
                    }
                    else{
                        $msg="the was a problem uploading image". $_FILES['image']['error'];
                    }
                    echo "Debug Info:";
            var_dump($produitC); // Vérifiez si les données sont correctes
            var_dump($msg); // Affichez le message d'erreur

        header('Location:produit.php');
    } else
        $error = "Missing information";
}

$type = $typec->affichertype();

?>






















<html lang="en"><head>
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
<style type="text/css" id="operaUserStyle"></style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>
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
        <a class="sidebar-brand brand-logo2" href="listUser.php"><img src="assets/images/logo2.png" alt="logo"></a>
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
        <div class="card">
                  <div class="card-body">
                  <center>
                  <center><h2 class="text-warning"> Produits</h2></center>
                      </h1>
    <a href="produit.php"    class="btn btn-info btn-fw" >Back to list </a>
    </h1>
</center>
<?php
    if (isset($_POST['id'])) {
        $produit = $produitC->showproduit($_POST['id']);
        $typess=$produitC->showtypes($produit['type']);
    ?>
   
                    <form class="forms-sample"  action="" method="POST"   enctype="multipart/form-data" >
                    <input   type="hidden"   name="size"  value="1000000"    >
                    <input type="hidden" id="id" name="id"     value="<?php echo $produit['id'] ?>"       />





                    <label for="exampleSelectGender" class="text-info">choisir un type </label>
                    <div class="form-group">
                        
                        <select class="form-control text-light" id="exampleSelectGender" name="type">
                        <option value="<?= $types['idtype'] ?>">
                <div class="custom-option">
                    <span class="label">Nom :</span>
                    <span class="value"><?= $typess['nomtype'] ?></span>
                    
                </div>
            </option>










                        <?php foreach ($type as $types) { ?>
                            <?php  if($types['nomtype']!=$typess['nomtype'] && $types['descriptiontype']!=$typess['descriptiontype'] ) {       ?>
                            
                            
            <option value="<?= $types['idtype'] ?>">
                <div class="custom-option">
                    <span class="label">Nom :</span>
                    <span class="value"><?= $types['nomtype'] ?></span>
                    
                </div>
            </option>
        <?php } ?>
        <?php } ?>
                        </select>


                        </div>
                        









                        <label for="exampleInputName1" class="text-info">Nom</label>
                      <div class="form-group">
                       
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"  name="productname"    value="<?php echo $produit['nom'] ?>"  >
                        <span id="erreurnom" class="erreur" style="color: red"></span>
                      </div>
                      <label for="exampleTextarea1" class="text-info">Description</label>
                      <div class="form-group">
                      
                        <textarea class="form-control"  name="productdescription"        id="exampleTextarea1" rows="8"><?php echo $produit['description'] ?></textarea>
                        <span id="erreurdescription" class="erreur" style="color: red"></span>

                      </div>
                      <label for="exampleInputMobile"class="col-sm-3 col-form-label text-info">Prix</label>
                      <div class="form-group row">
                       
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputMobile" placeholder="Prix"     name="productprice"    value="<?php echo $produit['prix'] ?>">
                          <span id="erreurprice" class="erreur" style="color: red"></span>
                        </div>
                      </div>

                      <label for="exampleInputMobile" class="col-sm-3 col-form-label text-info">Quantite</label>
                      <div class="form-group row">
                     
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputMobilee" placeholder="Quantite"    name="productstock"   value="<?php echo $produit['quantite'] ?>">
                          <span id="erreurstock" class="erreur" style="color: red"></span>
                        </div>
                      </div>
                      <label class="text-info">File upload</label>
                      <div class="form-group">
                        
                      <input type="file" name="image" class="btn btn-inverse-primary btn-fw">

                        
                        
                        
                            


      

                      <input type="submit" id="saveButton" class="btn btn-outline-primary btn-fw" value="Update" name="save"   >
                      <input type="reset" id="resetButton"
                      class="btn btn-outline-warning btn-fw"value="Reset" onclick="effacerMessagesErreur()">

                    
                    <button type="button" id="bouton"   class="btn btn-outline-info btn-fw"  >Verifier</button></td>

                      
























                    </form>
                    <?php
    }
    ?>
   
                  </div>
                </div>








 
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

<script src="emir.js"></script>


</body></html>