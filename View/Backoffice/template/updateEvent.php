<?php
require 'C:\xampp\htdocs\fitness-gym-web\Controller\EventC.php';
require 'C:\xampp\htdocs\fitness-gym-web\Model\Event.php';

require_once 'C:/xampp/htdocs/fitness-gym-web/Controller/Type_eventC.php'; 


$type_eventC = new Type_eventC();  
$type_events = $type_eventC->listeType_event();
// create event
$event = null;
// create an instance of the controller
$eventC = new EventC();
$error = "";

if (isset($_POST["nom"]) && isset($_POST["local"]) && isset($_POST["date"]) && isset($_POST["temps"]) && isset($_POST["description"]) && isset($_POST["type_event"])) {
    if (!empty($_POST['nom']) && !empty($_POST["local"]) && !empty($_POST["date"]) && !empty($_POST["temps"]) && !empty($_POST["description"]) && !empty($_POST["type_event"])) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $event = new event(null, $_POST['nom'], $_POST['local'], $_POST['date'], $_POST['temps'], $_POST['description'], $_POST['type_event']);
        var_dump($event);

        $eventC->updateEvent($event, $_POST['idevent']);

        header('Location:listeEvent.php');
    } else
        $error = "Missing information";
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

                  
                      <div id="form-container">
                          <button class="btn btn-dark btn-fw"><a href="listeEvent.php">Back to list</a></button>
                          <hr>
                  
                          <div id="error">
                              <?php echo $error; ?>
                          </div>
                  
                          <?php if (isset($_POST['idevent'])) {
                              $event = $eventC->showEvent($_POST['idevent']);
                          ?>
                  
                              <form action="" method="POST" class="forms-sample">
                                  
                                    <div class="form-group">
                                          <label for="idevent" class="text-light">idevennement</label>
                                          
                                              <input type="hidden" id="idevent" name="idevent" class="form-control" value="<?php echo isset($_POST['idevent']) ? $_POST['idevent'] : ''; ?>" readonly />
                  
                                              </div>        
                                    <div class="form-group">
                                          <label for="nom" class="text-light">nom:</label>
                                          
                                              <input type="text" id="nom" name="nom" class="form-control text-light" value="<?php echo $event['nom'] ?>" />
                                              <span id="erreurNom" style="color: red"></span>
                                    </div>    
                                    <div class="form-group">  
                                          <label for="local" class="text-light">Localisation :</label>
                                          
                                              <input type="text" id="local" name="local" class="form-control text-light" value="<?php echo $event['local'] ?>" />
                                              <span id="erreurLocal" style="color: red"></span>
                                              </div>       
                                    <div class="form-group">
                                          <label for="date" class="text-light">Date :</label>
                                          
                                              <input type="date" id="date" name="date" class="form-control text-light" value="<?php echo $event['date'] ?>" />
                                              <span id="erreurDate" style="color: red"></span>
                                              </div>     
                                    <div class="form-group">
                                          <label for="temps" class="text-light">Temps :</label>
                                          
                                              <input type="time" id="temps" name="temps" class="form-control text-light" value="<?php echo $event['temps'] ?>" />
                                              <span id="erreurDate" style="color: red"></span>
                                              </div>   
                                    <div class="form-group">
                                          <label for="description" class="text-light">Description :</label>
                                          
                                              <input type="text" id="description" name="description" class="form-control text-light" value="<?php echo $event['description'] ?>" />
                                              <span id="erreurLocal" style="color: red"></span>
                                              </div>   
                                    <div class="form-group">
                                          <label for="type_event" class="text-light">Type_event :</label>
                                          
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
                                          
                                              <input type="submit" value="Save" class="btn btn-outline-primary btn-icon-text" class="mdi mdi-file-check btn-icon-prepend">
                                          
                                          
                                              <input type="reset" value="Reset" class="btn btn-outline-warning btn-icon-text" class="mdi mdi-reload btn-icon-prepend">
                                          
                                    
                              </form>
                          <?php } ?>
                      </div>
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