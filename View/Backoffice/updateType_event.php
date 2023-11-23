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

        <?php if (isset($_POST['idtype_event'])) {
            $type_event = $type_eventC->showType_event($_POST['idtype_event']);
        ?>

            <form action="" method="POST">
                <table>
                    <tr>
                        <td><label for="idtype_event">id_type_evennement</label></td>
                        <td>
                            <input type="hidden" id="idtype_event" name="idtype_event" value="<?php echo isset($_POST['idtype_event']) ? $_POST['idtype_event'] : ''; ?>" readonly />

                        </td>
                    </tr>
                    <tr>
                        <td><label for="nom">nom:</label></td>
                        <td>
                            <input type="text" id="nom" name="nom" value="<?php echo $type_event['nom'] ?>" />
                            <span id="erreurNom" style="color: red"></span>
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