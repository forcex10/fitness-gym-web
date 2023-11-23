<?php
require_once "../../controller/Type_eventC.php";

$type_eventC = new Type_eventC();

$idtype_event = ""; // Initialize the variable to store the selected type

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['type_event']) && isset($_POST['search'])) {
        $idtype_event = $_POST['type_event'];
        $list = $type_eventC->afficherEvent($idtype_event);
    }
}

$type_events = $type_eventC->afficherType_event();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'événements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 400px;
        }

        h1 {
            color: #008080;
            font-size: 24px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #008080;
        }

        select {
            padding: 10px;
            margin-bottom: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #008080;
            color: #fff;
            padding: 12px;
            cursor: pointer;
            border: none;
            width: 100%;
            box-sizing: border-box;
            border-radius: 4px;
        }

        h2 {
            color: #008080;
            font-size: 20px;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            background-color: #fff;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Recherche d'événement par type</h1>
        <form action="" method="POST">
            <label for="type_event">Sélectionner un type :</label>
            <select name="type_event" id="type_event">
            <?php
                foreach ($type_events as $type_event) {
                    $selected = ($type_event['idtype_event'] == $idtype_event) ? 'selected' : '';
                    echo '<option value="' . $type_event['idtype_event'] . '" ' . $selected . '>' . $type_event['nom'] . '</option>';
                }
            ?>

            </select>
            <input type="submit" value="Rechercher" name="search">
        </form>

        <?php if (isset($list)) { ?>
    <h2>Événements correspondants au type sélectionné :</h2>
    <ul>
        <?php foreach ($list as $event) { ?>
            <li><?= $event['nom'] ?> - <?= $event['local'] ?> - <?= $event['date'] ?> - <?= $event['temps'] ?> - <?= $event['description'] ?></li>
        <?php } ?>
    </ul>
<?php } ?>
    </div>
</body>
</html>
