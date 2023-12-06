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


<!DOCTYPE html>
<html lang="en">
<head>

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
    <div class="main-panel">
        <div class="content-wrapper">

        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav w-100">
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
            </nav>

            <div class="row">
                <center>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ajouter Evenement</h4>
                                <div class="table-responsive">
                                    <body>
                                        <a  href="listeEvent.php"> Back to list </a>
                                        <hr>
                                        <div id="map"></div>
                                        <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                                            <div class="form-group">
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
                </center>
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
</body>
</html>