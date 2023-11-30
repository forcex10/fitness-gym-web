<?php
include "../controller/type_courC.php";

$c = new courTypeC();
$tab = $c->listTypeCours();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Courses</title>
    <link rel="stylesheet" href="listCoure.css">
</head>
<body>

    <center>
        <h1>List of Courses</h1>
        <h2>
            <a href="Add_style_Cour.php">Add type Course</a>
        </h2>
    </center>

    <table>
        <tr>
            <th>Id Course</th>
            <th>Name</th>
            <th>Description</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($tab as $courType) { ?>
            <tr>
                <td><?= $courType['id']; ?></td>
                <td><?= $courType['nom_type']; ?></td>
                <td><?= $courType['description_type']; ?></td>
                <td align="center">
                    <form method="POST" action="updateTypeCour.php">
                        <button type="submit" class="update-btn" name="update" value="Update">Update</button>
                        <input type="hidden" value="<?= $courType['id']; ?>" name="id">
                    </form>
                </td>
                <td>
                    <a href="deleteTypeCour.php?id=<?= $courType['id']; ?>"  class="delete-link">Delete</a>
                </td>
            </tr>
        <?php } ?>

    </table>
</body>
</html>
