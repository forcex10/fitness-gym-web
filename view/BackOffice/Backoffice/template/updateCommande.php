<?php
 include_once "C:/xampp/htdocs/fitness-gym-web/Controller/CommandeC.php";
 include_once "C:/xampp/htdocs/fitness-gym-web/Controller/PanierC.php";
 include_once "C:/xampp/htdocs/fitness-gym-web/Controller/produitC.php";
 include_once "C:/xampp/htdocs/fitness-gym-web/Model/Commande.php";
 session_start();
 $produitC=new produitC();
 $commandeC=new CommandeC();
 $panierC = new PanierC();
 $commande2=$commandeC->showCommande($_POST['id_commande']);
 $list = $panierC->showPanierClient($commande2['id_client']);
 if($_SERVER["REQUEST_METHOD"]=="POST"){
     if(isset($_POST['submit']) ) {
         $commande=new Commande(null,$_POST['id_client'],$_POST['date_commande'],$_POST['status'],$_POST['prix_commande'],$_POST['methode_paiement'],$_POST['num'],$_POST['cvv'],$_POST['exp'],$_POST['titulaire'],$_POST['adresse'],$_POST['ville'],$_POST['code_postal'],$_POST['methode_livraison'],false);
         $commandeC->updateCommande($commande,$_POST['id_commande']);
         header('Location:listeCommande.php');
     }
   }

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
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:sur_place;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:sur_place;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:sur_place;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>
<script>

function afficherChampsCarte() {
    var methode = document.getElementById("methode_paiement").value;
    var champsCarte = document.querySelectorAll(".champsCarte");

    champsCarte.forEach(function(champ) {
        champ.style.display = "none";
    });

    if (methode === "carte") {
        document.getElementById("champsCarte").style.display = "block";
    } 
    
    
}

document.addEventListener('DOMContentLoaded', function() {
afficherChampsCarte();
});
</script>


</head>
<body class="">
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner d-sur_place d-flex" id="proBanner">
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
          <button class="navbar-toggler navbar-toggler-right d-lg-sur_place align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <?php
            $commande1= $commandeC->showCommande($_POST['id_commande']);
        ?>

            <center>
            <div class="col-md-6 grid-margin stretch-card">
                    <div class="card" align="center">
                    <div class="card-body">
                        <h4 class="card-title">Mise A Jour Commande</h4>
                        <br/>
                        <form class="forms-sample" action="" method="POST" onsubmit="return validerFormulaire()">
                        <div class="form-group row">
                            <label for="id_commande" class="col-sm-3 col-form-label" >id_commande</label>
                            <div class="col-sm-9  ">
                            <input type="text" class="form-control text-light" id="id_commande" name="id_commande" value="<?php echo $_POST['id_commande'] ?>" readonly >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_client" class="col-sm-3 col-form-label" >id_client</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control text-light" id="id_client" name="id_client" placeholder="id_client" value="<?php echo $commande1['id_client'] ;?>" readonly>
                            <label id="erreur_id_client" class="text-danger"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_commande" class="col-sm-3 col-form-label" >date_commande</label>
                            <div class="col-sm-9  ">
                            <input type="text" class="form-control text-light" id="date_commande" name="date_commande" value="<?php echo $commande1['date_commande'] ?>" readonly >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">status</label>
                            <div class="col-sm-9">
                            <select id="status" name="status" class="form-control form-control-sm text-light" >
                            <option value="NoConfirm" <?php if( $commande1['status']==='NoConfirm'){echo "selected";}?>>Non Confirmer </option>
                            <option value="Confirme" <?php if( $commande1['status']==='Confirme'){echo "selected";}?>>Confirme </option>
                            <option value="distribue"  <?php if( $commande1['status']==='distribue'){echo "selected";}?>>Distribuer </option>
                            <option value="annuler"  <?php if( $commande1['status']==='annuler'){echo "selected";}?>>Annuler </option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prix_commande" class="col-sm-3 col-form-label" >prix_commande</label>
                            <div class="col-sm-9  ">
                            <input type="text" class="form-control text-light" id="prix_commande" name="prix_commande" value="<?php echo $commande1['prix_commande'] ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="methode_paiement" class="col-sm-3 col-form-label">methode_paiement</label>
                            <div class="col-sm-9">
                            <select id="methode_paiement" name="methode_paiement" class="form-control form-control-sm text-light" onchange="afficherChampsCarte()">
                            <option value="sur_place" <?php if( $commande1['methode']==='sur_place'){echo "selected";}?>>sur_place </option>
                            <option value="carte" <?php if( $commande1['methode']==='carte'){echo "selected";}?>>Par Carte </option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row champsCarte" id="champsCarte" >
                            <div class="col-sm-9">
                            <label for="num" class="col-sm-3 col-form-label">Numéro de Carte :</label>
                            <input type="text" id="num" name="num"  class="form-control text-light" value="<?php echo  $commande1['num'] ?>" />
                            <br/>
                            <label id="erreur_num" class="text-danger" ></label></div>
                            <div class="col-sm-9">
                            <label for="cvv" class="col-sm-3 col-form-label">Code cvv :</label>
                            <input type="text" id="cvv" name="cvv"  class="form-control text-light" value="<?php echo  $commande1['cvv'] ?>" />
                            <br/>
                            <label id="erreur_cvv" class="text-danger"></label></div>
                            <div class="col-sm-9">
                            <label for="exp" class="col-sm-3 col-form-label">Date d'expiration :</label>
                            
                            <input type="text" id="exp" name="exp"  class="form-control text-light" value="<?php echo  $commande1['exp'] ?>" />
                            <br/>
                            <label id="erreur_exp"  class="text-danger"></label></div>
                            <div class="col-sm-9">
                            <label for="titulaire" class="col-sm-3 col-form-label" >Titulaire de la Carte:</label>
                            
                            <input type="text" id="titulaire" name="titulaire"  class="form-control text-light" value="<?php echo  $commande1['titulaire'] ?>" />
                            <br/>
                            <label id="erreur_titulaire" class="text-danger" ></label></div>
                        </div>
                        <div class="form-group row">
                            <label for="ville" class="col-sm-3 col-form-label" >ville</label>
                            <div class="col-sm-9  ">
                            <input type="text" class="form-control text-light" id="ville" name="ville" value="<?php echo $commande1['ville'] ?>" >
                            <label id="erreur_ville" ></label><br><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code_postal" class="col-sm-3 col-form-label" >code_postal</label>
                            <div class="col-sm-9  ">
                            <input type="text" class="form-control text-light" id="code_postal" name="code_postal" value="<?php echo $commande1['code_postale'] ?>" >
                            <label id="erreur_code_postal" ></label><br><br>  
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="adresse" class="col-sm-3 col-form-label" >adresse</label>
                            <div class="col-sm-9  ">
                            <input type="text" class="form-control text-light" id="adresse" name="adresse" value="<?php echo $commande1['adresse'] ?>" >
                            <label id="erreur_adresse" ></label><br><br>  
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="methode_livraison" class="col-sm-3 col-form-label">methode_livraison</label>
                            <div class="col-sm-9">
                            <select id="methode_livraison" name="methode_livraison" class="form-control form-control-sm text-light">
                            <option value="retrait_salle" <?php if( $commande1['livraison']==='retrait_salle'){echo "selected";}?>>retrait a la salle </option>
                            <option value="transporteur" <?php if( $commande1['livraison']==='transporteur'){echo "selected";}?>>Par transporteur (6 DT)</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?php $i=0 ; foreach($list as $p) : $produit = $produitC->showproduit($p['id_produit']); $i++;?>
                            <h4>produit <?php echo $i;?></h4>
                            <h5><?php echo $produit['nom'].'   prix :  '. $produit['prix'].'   DT  '.'  quantite :  '. $p['quantite'].'   totale produit :  '.$p['totale']. '  DT  '; ?></h5>
                               <?php endforeach; ?>
                        </div>
                        <button type="submit" name="submit" class="btn btn-outline-primary btn-fw"> Save </button>
                        <a href="listeCommande.php" class="btn btn-outline-danger btn-fw">Annuler </a>
                        </form>
                    </div>
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
   var methodeLivraison = document.getElementById("methode_livraison");
   methodeLivraison.addEventListener("change", function() {

var totale=document.getElementById("prix_commande").value;
totale=parseInt(totale);
if (methodeLivraison.value === "transporteur") {
    totale+=6;
    document.getElementById("prix_commande").value=totale;
} else {
    totale-=6;
    document.getElementById("prix_commande").value=totale;
}
});
  

function validerFormulaire() {
    var ville=document.getElementById("ville").value;
    var code=document.getElementById("code_postal").value;
    var adresse=document.getElementById("adresse").value;
    var erreur_ville=document.getElementById("erreur_ville");
    var erreur_code=document.getElementById("erreur_code_postal");
    var erreur_adresse=document.getElementById("erreur_adresse");


if(ville=="" || estEntier(ville) ){
    erreur_ville.innerHTML="veuillez saisir une ville "; return false;

}
else 
    erreur_ville.innerHTML="";
if(code=="" || !estEntier(code) || code<1000 || code>9999 ){
    erreur_code.innerHTML="veuillez saisir un code postale correcte "; return false;

}
else 
    erreur_code.innerHTML="";

if(adresse==""){
    erreur_adresse.innerHTML="veuillez saisir une adresse "; return false;

}
else 
    erreur_adresse.innerHTML="";

var methode_paiement = document.getElementById("methode_paiement").value;
var champsCarte = document.getElementById("champsCarte");

// Vérification des champs selon la méthode de paiement sélectionnée
if (methode_paiement == "carte") {
    var num = document.getElementById("num").value;
    var titulaire = document.getElementById("titulaire").value;
    var exp= document.getElementById("exp").value;
    var cvv = document.getElementById("cvv").value;
    var erreur_num = document.getElementById("erreur_num");
    var erreur_titulaire = document.getElementById("erreur_titulaire");
    var erreur_exp= document.getElementById("erreur_exp");
    var erreur_cvv = document.getElementById("erreur_cvv");


    if (!estEntier(num) || num<1000000000000000 || num>9999999999999999 || !estEntier(cvv) || cvv<1000 || cvv>9999 || !estMoisAnnee(exp) || titulaire === "") {
        if(!estEntier(num) || num<1000000000000000 || num>9999999999999999){
            erreur_num.innerHTML="Veuillez saisir un numero de carte  correct (16 chiffres) Actuellement: " + num.length + " chiffres";return false;}
        else 
            erreur_num.innerHTML="";

        if(!estEntier(cvv) || cvv<1000 || cvv>9999 ){
            erreur_cvv.innerHTML="Veuillez saisir un code de carte  correct (4 chiffre )";return false;}
        else 
            erreur_cvv.innerHTML="";
        if(!estMoisAnnee(exp)){
            erreur_exp.innerHTML="Veuillez saisir une date d'expiration correct de la carte  (mm/aa) ";return false;}
        else 
            erreur_exp.innerHTML="";
        if(titulaire === ""){
            erreur_titulaire.innerHTML="Veuillez saisir un titulaire de la carte  ";return false;}
        else 
            erreur_titulaire.innerHTML="";

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

</body></html>