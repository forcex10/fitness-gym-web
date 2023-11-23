<?php
include_once('../../Controller/EventC.php');
include_once '../../Model/Event.php';
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un evennement</title>

    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        a {
            display: block;
            margin: 20px 0;
            text-decoration: none;
            color: #007BFF;
            font-size: 16px;
        }

        hr {
            border: 1px solid #ddd;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        span {
            margin-left: 5px;
        }
    </style>
</head>
<body>

    <a  href="listeEvent.php"> Back to list </a>
    <hr>
    


<form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" required />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="local">Localisation :</label></td>
                <td>
                <input type="text" id="local" name="local" required />
                    <span id="erreurdescription" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date">Date d'evennement :</label></td>
                <td>
                <input type="date" id="date" name="date" required />
                <span id="erreurtemps" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="temps">temps d'evennement :</label></td>
                <td>
                <input type="time" id="temps" name="temps" required />
                <span id="erreurtemps" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="description">Description :</label></td>
                <td>
                <input type="text" id="description" name="description" required />
                    <span id="erreurdescription" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="type_event">Type_event :</label></td>
                <td>
                    <select id="type_event" name="type_event" required>
                        <?php
                        foreach ($type_events as $type_event) {
                            echo '<option value="' . $type_event['idtype_event'] . '">' . $type_event['nom'] ;
                        }
                        ?>
                    </select>
                    <span id="erreur_type_event" style="color: red"></span>
                </td>
            </tr>
            


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>
</form>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.querySelector('form');
            var nomInput = document.getElementById('nom');
            var erreurNom = document.getElementById('erreurNom');

            form.addEventListener('submit', function (event) {
                // Vérifier si le champ "nom" contient des chiffres
                if (!/^[a-zA-Z]+$/.test(nomInput.value)) {
                    erreurNom.textContent = 'Le nom ne peut pas contenir de chiffres.';
                    event.preventDefault(); // Empêcher l'envoi du formulaire
                } else {
                    erreurNom.textContent = ''; // Effacer le message d'erreur s'il y en a un
                }
            });
        });
    </script>
</body>
</html>