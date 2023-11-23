<?php
include "../controller/coursC.php";

$c = new courC();
$tab = $c->listCours();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Courses</title>
    <link rel="stylesheet" href="listCour.css">
</head>
<body>

    <center>
        <h1>List of Courses</h1>
        <h2>
            <a href="AddCour.php">Add Course</a>
        </h2>
    </center>

    <table>
        <tr>
            <th>Id Course</th>
            <th>Name</th>
            <th>Description</th>
            <th>Teacher</th>
            <th>horaire</th>
            <th>images</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($tab as $cour) { ?>
            <tr>
                <td><?= $cour['id']; ?></td>
                <td><?= $cour['nom']; ?></td>
                <td><?= $cour['description']; ?></td>
                <td><?= $cour['enseignant']; ?></td>
                <td><?= $cour['horaire']; ?></td>
                <td><img src="images/<?= $cour['image'] ?>" alt="Produit Image" class="product-image" style="width: 100px; height: 100px; border: 2px solid #3498db;"></td>
                <td align="center">
                    <form method="POST" action="updateCour.php">
                        <button type="submit" class="update-btn" name="update" value="Update">Update</button>
                        <input type="hidden" value="<?= $cour['id']; ?>" name="idCour">
                    </form>
                </td>
                <td>
                    <a href="deleteCour.php?id=<?= $cour['id']; ?>" class="delete-link">Delete</a>
                </td>
            </tr>
        <?php } ?>

    </table>
</body>
</html>
