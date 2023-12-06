<?php
// Include the controller file
include ('C:\xampp\htdocs\fitness-gym-web\Controller\EventC.php');
include ('C:\xampp\htdocs\fitness-gym-web\Controller\Type_eventC.php');
// Create an instance of the controller
$eventController = new EventC();

// Fetch events and convert to an array
$eventsStmt = $eventController->listeEvent();
$events = $eventsStmt->fetchAll(PDO::FETCH_ASSOC);

// Sort events by date and time
usort($events, function ($a, $b) {
    $dateComparison = strtotime($a['date']) - strtotime($b['date']);

    if ($dateComparison == 0) {
        // If dates are the same, compare times
        return strtotime($a['temps']) - strtotime($b['temps']);
    }

    return $dateComparison;
});

$type_eventC = new Type_eventC();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>

    <style>
        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./View/Frontoffice/activitar-master/style.css" />
    <script type="module" src="./index.js"></script>

    <meta charset="UTF-8">
    <meta name="description" content="Activitar Template">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activitar | Template</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">


    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
        })({
            key: "AIzaSyCSE5nNxd2Xwx2qI3KJNfrbXAFKlI0mcDg",
            v: "beta"
        });
    </script>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize and add the map
            let map;

            async function initMap() {
                const latElement = document.getElementById('lat');
                const lngElement = document.getElementById('lng');

                if (latElement && lngElement) {
                    const position = {
                        lat: parseFloat(latElement.value) || -25.344,
                        lng: parseFloat(lngElement.value) || 131.031,
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
            }

            // Call the initMap function when the page loads
            initMap();
        });
    </script>

</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header-section header-normal">
        <div class="container-fluid">
            <div class="logo">
                <a href="#">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <div class="top-social">
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="container">
                <div class="nav-menu">
                    <nav class="mainmenu mobile-menu">
                        <ul>
                            <li><a href="./index.html">Home</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>

    <section class="breadcrumb-section set-bg spad" data-setbg="img/about-bread.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Latest Events</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2> Our Events </h2>
                        <p>List of all news and events that take place related to us</p>
                    </div>
                    <div class="row blog-gird">
                        <div class="grid-sizer"></div>
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="text-danger">Events</i></h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tr>
                                             
                                                <th>Poster</th>
                                                <th>Map</th>
                                            </tr>
                                            <?php
                                            // Display events in the table
                                            foreach ($events as $event) {
                                            ?>
                                                <tr>
                                                <td>
                                                        <!-- Display the image with a relative path -->
                                                        <img src="uploads/<?php echo basename($event['image']); ?>" alt="Event Image" style="width: 300px; height: 300px;">
                                                    </td>
                                 
                                                    <td>
                                                        <div id="map_<?php echo $event['idevent']; ?>" class="event-map" style="width: 600px; height: 300px; "></div>
                                                        <script>
                                                            // Initialize and add the map for each event
                                                            async function initMap_<?php echo $event['idevent']; ?>() {
                                                                const position = {
                                                                    lat: parseFloat(<?php echo $event['lat']; ?>) || -25.344,
                                                                    lng: parseFloat(<?php echo $event['lng']; ?>) || 131.031,
                                                                };

                                                                // Request needed libraries.
                                                                // @ts-ignore
                                                                const { Map } = await google.maps.importLibrary("maps");
                                                                const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

                                                                // The map, centered at the provided or default location
                                                                const map = new Map(document.getElementById("map_<?php echo $event['idevent']; ?>"), {
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

                                                            // Call the initMap function for each event when the page loads
                                                            document.addEventListener('DOMContentLoaded', initMap_<?php echo $event['idevent']; ?>);
                                                        </script>
                                                    </td>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row blog-gird">
                <div class="grid-sizer"></div>
            </div>
        </div>
    </section>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
