<?php
include('C:\xampp\htdocs\fitness-gym-web\Controller\Type_eventC.php');
include 'C:\xampp\htdocs\fitness-gym-web\Model\Type_event.php';


    $type_eventController = new Type_eventC();
    if (isset($_POST['nom']) ) {
        if(!empty($_POST['nom'])){
            $type_event= new type_event(null,$_POST['nom']);
            $type_eventC =$type_eventController->addType_event($type_event);
            header("location:listeType_event.php");
        }
        else{
            $erreur="missing information";

        }
}
?>



<html lang="en"><head>


  <title>Ajouter un evennement</title>



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
</head>
<body class="">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row ">
            <center>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                <h4 class="card-title">Ajouter Type Evénement</h4>
                  <div class="table-responsive">
                    <body>

                      <a  href="listeType_event.php"> Back to list </a>
                      <hr>
                      
                  
                  
                  <form action="" method="POST" class="forms-sample">
                    <div class="form-group row">
                                  <label for="nom" class="col-sm-3 col-form-label" class="text-light">Nom :</label>
                                  
                                      <input type="text" id="nom" name="nom" class="form-control text-light" />
                                      <span id="erreurNom" style="color: red"></span>
                                  
                              
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
                // Vérifier si le champ "nom" contient des chiffres
                if (!/^[a-zA-Z]+$/.test(nomInput.value)) {
                    erreurNom.textContent = 'Le champ est vide';
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
            </div><center>
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
</body></html>