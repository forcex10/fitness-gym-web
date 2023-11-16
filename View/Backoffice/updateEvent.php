<?php
require 'C:\xampp\htdocs\fitness-gym-web\Controller\EventC.php';
require 'C:\xampp\htdocs\fitness-gym-web\Model\Event.php';
$error = "";

// create event
$event = null;
// create an instance of the controller
$eventC = new EventC();


if (isset($_POST["nom"]) && isset($_POST["local"]) && isset($_POST["date"]) ) {
    if (!empty($_POST['nom']) && !empty($_POST["local"]) && !empty($_POST["date"]) ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $event = new event(
            null,
            $_POST['nom'],
            $_POST['local'],
            $_POST['date']

        );
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
</head>

<body>
    <button><a href="listeEvent.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idevent'])) {
        $event = $eventC->showEvent($_POST['idevent']);
    }
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">id_evennement:</label></td>
                    <td>
                        <input type="text" id="idevent" name="idevent" value="<?php echo $_POST['idevent'] ?>" readonly />
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
                    <td><label for="local">localisation :</label></td>
                    <td>
                        <input type="text" id="local" name="local" value="<?php echo $event['local'] ?>" />
                        <span id="erreurLocal" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="date">date :</label></td>
                    <td>
                        <input type="date" id="date" name="date" value="<?php echo $event['date'] ?>" />
                        <span id="erreurDate" style="color: red"></span>
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
    
</body>

</html>
