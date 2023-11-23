<?php
// Inclure le fichier du contrôleur
include ('../../Controller/Type_eventC.php');

// Créer une instance du contrôleur
$type_eventController = new Type_eventC();
$type_events = $type_eventController->listeType_event();

?>


<html>
    <head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #555;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Liste des types des evennements</h1>
    <h2>
        <a href="addType_event.php"target="_blank">ajouter Type Evennement</a>
    </h2>

<table border="1" align="center" width="70%">
    <tr>
        <th>Id Type_Evennement</th>
        <th>Nom</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    // Afficher les joueurs dans le tableau
    foreach ($type_events as $type_event) {
    ?>
        <tr>
        <td><?php echo $type_event['idtype_event'] ?> </td>
        <td><?php echo $type_event['nom'] ?> </td>
        <td align="center">
                <form method="POST" action="updateType_event.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $type_event['idtype_event']; ?> name="idtype_event">
                </form>
            </td>
            <td>
            <a href="deleteType_event.php?idtype_event=<?php echo $type_event['idtype_event']?>" > DELETE </a> 
            </td>
        </tr>
        <?php
}
?>
   
</table></body>
</html>