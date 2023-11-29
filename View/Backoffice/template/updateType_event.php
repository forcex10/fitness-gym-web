<?php
require 'C:\xampp\htdocs\fitness-gym-web\Controller\Type_eventC.php';
require 'C:\xampp\htdocs\fitness-gym-web\Model\Type_event.php';

$error = "";


// create event
$type_event = null;
// create an instance of the controller
$type_eventC = new Type_eventC();


if (isset($_POST["nom"])) {
    if (!empty($_POST['nom'])   ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $type_event = new type_event(null,$_POST['nom']);
        var_dump($type_event);

        $type_eventC->updateType_event($type_event, $_POST['idtype_event']);

        header('Location:listeType_event.php');
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
            <h4 class="card-title">Update Evenement</h4>
            <div class="table-responsive">
              <body>

                  
                      <div id="form-container">
                          <button class="btn btn-dark btn-fw"><a href="listeType_event.php">Back to list</a></button>
                          <hr>
                  
                          <div id="error">
                              <?php echo $error; ?>
                          </div>
                  
                          <?php if (isset($_POST['idtype_event'])) {
                              $type_event = $type_eventC->showType_event2($_POST['idtype_event']);
                          ?>
                  
                              <form action="" method="POST" class="forms-sample">
                                  
                                    <div class="form-group">
                                          <label for="idtype_event" class="text-light">idType_Evennement</label>
                                          
                                              <input type="hidden" id="idtype_event" name="idtype_event" class="form-control text-light" value="<?php echo isset($_POST['idtype_event']) ? $_POST['idtype_event'] : ''; ?>" readonly />
                  
                                              </div>        
                                    <div class="form-group">
                                          <label for="nom" class="text-light">nom:</label>
                                          
                                              <input type="text" id="nom" name="nom" class="form-control text-light" value="<?php echo $type_event['nom'] ?>" />
                                              <span id="erreurNom" style="color: red"></span>
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