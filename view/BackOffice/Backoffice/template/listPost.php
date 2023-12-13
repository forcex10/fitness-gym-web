<?php

include "../../../../controller/PostC.php";
session_start();

$c = new PostC();
$tab = $c->listpost();

?>

   

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/logo2.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
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
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                
                
              </li>
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  
                  
                  
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  
              </li>
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
        <style>
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
  color: lightgray;
  
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
        background-color: lightgray; /* Permet à l'utilisateur de redimensionner verticalement si nécessaire */
    }

</style>

        <!-- partial -->
        
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Striped Table</h4><br><br>
              <div class="table-responsive">
                    <body>
                    <center><h2 class="text-warning">Liste postes</h2></center><br>
                    
              </h3>
              <center>
              <form method="GET" action="addPost.php" style="margin: 0;">
              <input type="hidden" value="<?= $post['idpost']; ?>" name="idpost">
              <button type="submit" class="btn btn-info btn-fw" name="Supprimer">ajouter post</button>
              </form><br>
              <!--<form method="GET" action="listCom.php" style="margin: 0;">
              <input type="hidden" value="<?= $post['idpost']; ?>" name="idpost">
              <button type="submit" class="btn btn-info btn-fw" name="afficher">afficher tous les commentaires</button>
              </form><br>
              <form method="GET" action="search.php" style="margin: 0;">
              <input type="hidden" value="<?= $post['idpost']; ?>" name="idpost">
              <button type="submit" class="btn btn-info btn-fw" name="afficher">afficher les commentaires de chaque post</button>
              </form>--><br>
              </center>


              <div class="table-responsive">
              <center>
                      <table>
                        <thead>
                          <tr>
                          <th class="text-info">Nom</th>
                          <th class="text-info">Prenom </th>
                          <th class="text-info">Date </th>
                          <th class="text-info">Post </th>
                          <th class="text-info">Image </th>
                          <th class="text-info">Options </th>
                          <th class="text-info">Signal </th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          

                          <?php foreach ($tab as $post) { ?>
           
                          <tr>
                            
                            <td><?= $post['nom']; ?> </td>
                            
                            <td><?= $post['prenom']; ?></td>
                            <td><?= $post['date']; ?></td>
                            <td>
                              <textarea class="post-textarea" readonly><?= $post['contenu']; ?></textarea>
                            </td>

                            <td>
                              <img src="<?= $post['img']; ?>" alt="pas d'image" class="post-image" />
                          </td>

                
               
               
                <td>
                  <?php if ($_SESSION['email']==$post['email']){?>
                    <!-- Bouton "Modifier" -->
                    <form method="POST" action="updatePost.php" style="margin-bottom: 5px;">
                        <button type="submit" class="btn btn-outline-success btn-fw" name="Modifier">Modifier</button>
                        <input type="hidden" value="<?= $post['idpost']; ?>" name="idpost">
                    </form>
                    <?php ;}?>

                    <!-- Bouton "Supprimer" -->
                    <form method="GET" action="deletePost.php" style="margin-bottom: 5px;">
                        <input type="hidden" value="<?= $post['idpost']; ?>" name="idpost">
                        <button type="submit" class="btn btn-outline-danger btn-fw" name="Supprimer" >Supprimer</button>
                    </form><br>

                    <!-- Bouton "Commenter" -->
                    <form method="GET" action="addCom.php" style="margin-bottom: 5px;">
                    <input type="hidden" value="<?= $post['idpost']; ?>" name="idpost">
                    <button type="submit" class="btn btn-outline-warning btn-fw">Commenter</button>
              
                  </form>
                  <td>
    <!-- Bouton "Signaler" -->
   <!-- Bouton "Signaler" -->
<form method="POST" action="signalpost.php" style="margin-bottom: 5px;">
    <input type="hidden" value="<?= $post['email']; ?>" name="idpost">
    <button type="submit" class="btn btn-outline-primary btn-fw" name="Signaler">Signaler</button>
</form>
</td>

                </td>
                </tr>
            </tr>
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
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
         
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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>
