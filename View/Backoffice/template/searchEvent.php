<?php
require_once ('C:\xampp\htdocs\fitness-gym-web\Controller\Type_eventC.php');

$type_eventC = new Type_eventC();

$idtype_event = ""; // Initialize the variable to store the selected type

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['type_event']) && isset($_POST['search'])) {
        $idtype_event = $_POST['type_event'];
        $list = $type_eventC->afficherEvent($idtype_event);
    }
}

$type_events = $type_eventC->afficherType_event();
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
<div class="main-panel">
  <div class="content-wrapper">
  <div class="row ">
  <center>
  <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="text-warning" class="card-title" >Recherche d'Evenement</h4>
            <div class="table-responsive">
              <body>
                      <div class="container">
                      <a href="listeEvent.php">Back to list</a>
                      <hr>

                          <h1  class="text-info">Recherche d'événement par type</h1>
                          <form action="" method="POST" class="forms-sample">
                           <div class="form-group">
                              <label for="type_event" class="text-light">Sélectionner un type :</label>
                              <select name="type_event" id="type_event" class="form-control text-light" >
                              <?php
                                  foreach ($type_events as $type_event) {
                                      $selected = ($type_event['idtype_event'] == $idtype_event) ? 'selected' : '';
                                      echo '<option value="' . $type_event['idtype_event'] . '" ' . $selected . '>' . $type_event['nom'] . '</option>';
                                  }
                              ?>
                  
                              </select>
                            </div>
                              <input type="submit" value="Rechercher" name="search" class="btn btn-outline-success btn-fw">
                          </form>
                  
                          <?php if (isset($list)) { ?>
                      <h2  class="text-info">Événements correspondants au type sélectionné :</h2>
                      <br></br>
                      <ul class="text-warning">
                        
                          <?php foreach ($list as $event) { ?>
                              <li><?= $event['nom'] ?> - <?= $event['local'] ?> - <?= $event['date'] ?> - <?= $event['temps'] ?> - <?= $event['description'] ?></li>
                          <?php } ?>
                      </ul>
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
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body></html>