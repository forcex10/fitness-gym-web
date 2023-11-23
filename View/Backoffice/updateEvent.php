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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>

    <style>
        /* Styles pour le thème de salle de sport */
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #ff4500;
            text-align: center;
        }

        /* Styles pour l'arrière-plan avec une image */
        #background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.6;
        }

        /* Styles pour le formulaire */
        #form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        #form-container input[type="text"],
        #form-container input[type="date"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #form-container input[type="submit"],
        #form-container input[type="reset"] {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #ff4500;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #error {
            color: red;
            margin-bottom: 10px;
        }

        button {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <img id="background-image" src="path/to/your/image.jpg" alt="Background Image">

    <h1>User Display</h1>

    <div id="form-container">
        <button><a href="listeType_event.php">Back to list</a></button>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <?php if (isset($_POST['idevent'])) {
            $event = $eventC->showEvent($_POST['idevent']);
        ?>

            <form action="" method="POST">
                <table>
                    <tr>
                        <td><label for="idevent">idevennement</label></td>
                        <td>
                            <input type="hidden" id="idevent" name="idevent" value="<?php echo isset($_POST['idevent']) ? $_POST['idevent'] : ''; ?>" readonly />

                        </td>
                    </tr>
                    <tr>
                        <td><label for="nom">nom:</label></td>
                        <td>
                            <input type="text" id="nom" name="nom" value="<?php echo $event['nom'] ?>" />
                            <span id="erreurNom" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="local">Localisation :</label></td>
                        <td>
                            <input type="text" id="local" name="local" value="<?php echo $event['local'] ?>" />
                            <span id="erreurLocal" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date">Date :</label></td>
                        <td>
                            <input type="date" id="date" name="date" value="<?php echo $event['date'] ?>" />
                            <span id="erreurDate" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="temps">Temps :</label></td>
                        <td>
                            <input type="time" id="temps" name="temps" value="<?php echo $event['temps'] ?>" />
                            <span id="erreurDate" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Description :</label></td>
                        <td>
                            <input type="text" id="description" name="description" value="<?php echo $event['description'] ?>" />
                            <span id="erreurLocal" style="color: red"></span>
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

                    <tr>
                        <td>
                            <input type="submit" value="Save">
                        </td>
                        <td>
                            <input type="reset" value="Reset">
                        </td>
                    </tr>
                </table>
            </form>
        <?php } ?>
    </div>
</body>

</html>