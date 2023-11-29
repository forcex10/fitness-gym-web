<?php
include_once('C:\xampp\htdocs\fitness-gym-web\Controller\EventC.php');
include_once 'C:\xampp\htdocs\fitness-gym-web\Model\Event.php';
require_once 'C:/xampp/htdocs/fitness-gym-web/Controller/Type_eventC.php'; 


$type_eventC = new Type_eventC();  
$type_events = $type_eventC->listeType_event();
 $eventController = new EventC();

    if (isset($_POST['nom']) || isset($_POST['local']) || isset($_POST['date']) || isset($_POST['temps']) || isset($_POST['description']) || isset($_POST['type_event'])) {
        if (!empty($_POST['nom']) || !empty($_POST['local']) || !empty($_POST['date']) || !empty($_POST['temps']) || !empty($_POST['description']) || !empty($_POST['type_event'])) {
            $event = new event(null, $_POST['nom'], $_POST['local'], $_POST['date'], $_POST['temps'], $_POST['description'], $_POST['type_event']);
            $eventC = $eventController->addEvent($event);
            header("location:listeEvent.php");
        } else {
            $erreur = "missing information";
        }
}
?>



<html lang="en"><head>

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
                  <h4 class="card-title">Ajouter Evenement</h4>
                  <div class="table-responsive">
                    <body>

                      <a  href="listeEvent.php"> Back to list </a>
                      <hr>
                      
                  
                  
                  <form action="" method="POST" class="forms-sample">
                        
                              <div class="form-group">
                                    <!-- Add the "required" class to the input field -->
                                    <input type="text" id="nom" name="nom" class="form-control text-light required" />
                                    <!-- Add a span element to display the error message -->
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
                              
                  
                  
                              
                                  <input type="submit" value="Save" class="btn btn-primary me-2">
                              
                              
                                  <input type="reset" value="Reset" class="btn btn-outline-warning btn-icon-text" class="mdi mdi-reload btn-icon-prepend">
                  </form>
                  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('form');
        var nomInput = document.getElementById('nom');
        var erreurNom = document.getElementById('erreurNom');
        var localInput = document.getElementById('local');
        var erreurLocal = document.getElementById('erreurLocal');
        var dateInput = document.getElementById('date');
        var erreurDate = document.getElementById('erreurDate');
        var tempsInput = document.getElementById('temps');
        var erreurTemps = document.getElementById('erreurTemps');
        var descriptionInput = document.getElementById('description');
        var erreurDescription = document.getElementById('erreurDescription');

        form.addEventListener('submit', function (event) {
            // Vérifier si le champ "nom" est vide ou contient des chiffres
            if (!/^[a-zA-Z]+$/.test(nomInput.value)) {
                erreurNom.textContent = 'Le champ est vide ou contient des chiffres.';
                erreurNom.style.color = 'red';
                event.preventDefault(); // Empêcher l'envoi du formulaire
            } else {
                erreurNom.textContent = ''; // Effacer le message d'erreur s'il y en a un
            }

            // Vérifier si le champ "local" est vide ou contient des chiffres
            if (!/^[a-zA-Z]+$/.test(localInput.value)) {
                erreurLocal.textContent = 'Le champ est vide ou contient des chiffres.';
                erreurLocal.style.color = 'red';
                event.preventDefault(); // Empêcher l'envoi du formulaire
            } else {
                erreurLocal.textContent = ''; // Effacer le message d'erreur s'il y en a un
            }

            // Add similar checks for other fields...

            // Vérifier si le champ "description" est vide ou contient des chiffres
            if (!/^[a-zA-Z]+$/.test(descriptionInput.value)) {
                erreurDescription.textContent = 'Le champ est vide ou contient des chiffres.';
                erreurDescription.style.color = 'red';
                event.preventDefault(); // Empêcher l'envoi du formulaire
            } else {
                erreurDescription.textContent = ''; // Effacer le message d'erreur s'il y en a un
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
    
    <!-- page-body-wrapper ends -->
  </div>
</body></html>