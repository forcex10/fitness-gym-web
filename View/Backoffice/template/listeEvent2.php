<?php
// Inclure le fichier du contrôleur
include ('../../Controller/EventC.php');
include ('../../Controller/Type_eventC.php');
// Créer une instance du contrôleur
$eventController = new EventC();
$events = $eventController->listeEvent();
$type_eventC = new Type_eventC();


usort($events, function ($a, $b) {
    return strtotime($a['date']) - strtotime($b['date']);
});

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
    <h1>Liste des evennements</h1>
    <h2>
        <a href="addEvent.php" target="_blank">ajouter un Evennement</a>
    </h2>

    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Evennement</th>
            <th>Nom</th>
            <th>Localisation</th>
            <th>date</th>
            <th>Temps</th>
            <th>Description</th>
            <th>Type_event</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        // Afficher les événements dans le tableau
        foreach ($events as $event) {
        ?>
            <tr>
                <td><?php echo $event['idevent'] ?> </td>
                <td><?php echo $event['nom'] ?> </td>
                <td><?php echo $event['local'] ?></td>
                <td><?php echo $event['date'] ?></td>
                <td><?php echo $event['temps'] ?></td>
                <td><?php echo $event['description'] ?></td>
                <td>
                    <?php
                    $type_event = $type_eventC->showType_event($event['type_event']);
                    echo $type_event;?>
                </td>

                <td align="center">
                    <form method="POST" action="updateEvent.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $event['idevent']; ?> name="idevent">
                    </form>
                </td>
                <td>
                    <a href="deleteEvent.php?idevent=<?php echo $event['idevent']?>"> DELETE </a> 
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
