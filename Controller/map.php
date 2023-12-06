<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    #map {
      height: 400px;
    }
  </style>
  <title>Intégration de la carte</title>
</head>
<body>

<div id="map"></div>

<script>
  // Initialiser la carte
  var mymap = L.map('map').setView([51.505, -0.09], 13);

  // Ajouter une couche de carte (par exemple, OpenStreetMap)
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(mymap);
</script>

</body>
</html>
