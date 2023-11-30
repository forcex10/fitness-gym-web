<?php
include "../controller/coursC.php";

$c = new courC();
$tab = $c->listCours();

if(isset($_GET['searchbutton'])){
    $tab = $c->searchcour($_GET['search']);
}



if(isset($_GET['trie'])){
    $tab = $c->trieprix();
}
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
        <form action="" method="GET">
        <input type="submit"  name="trie" value="trie par prix" class="update-btn"> 
        <input type="submit"  name="searchbutton" value="click to search" class="update-btn">
        <input type="text"  name="search" placeholder="search" >
        </form>
        <h2>
            <a href="AddCour.php">Add Course</a>
        </h2>
    </center>

    <table>
        <tr>
            <th>Id Course</th>
            <th>Name</th>
            <th>Description</th>
            <th>prix</th>
            <th>niveau</th>
            <th>images</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($tab as $cour) { ?>
            <tr>
                <td><?= $cour['id']; ?></td>
                <td><?= $cour['nom']; ?></td>
                <td><?= $cour['description']; ?></td>
                <td><?= $cour['prix']; ?> dt</td>
                <td><?= $cour['niveau']; ?></td>
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
