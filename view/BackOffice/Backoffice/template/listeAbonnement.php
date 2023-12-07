<?php
    include "C:/xampp/htdocs/fitness-gym-web/Controller/AbonnementC.php";
    $AbonnementC = new AbonnementC();
    $list = $AbonnementC->listAbonnement();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Abonnements</title>
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f3f3f3;
}

.container {
    width: 80%;
    margin: 20px auto;
}

h2 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
}

th {
    background-color: #f2f2f2;
}

td a {
    display: inline-block;
    padding: 5px 10px;
    margin-right: 5px;
    text-decoration: none;
    color: #fff;
    border-radius: 4px;
}

.update-link {
            display: inline-block;
            padding: 8px 16px;
            background-color: #2980b9;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .update-link:hover {
            background-color: #2c3e50;
        }

td a.delete-link {
    background-color: #e74c3c;
}

td a:hover {
    opacity: 0.8;
}

.add-button {
    display: block;
    width: 150px;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #2ecc71;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.add-button:hover {
    background-color: #27ae60;
}


    </style>
</head>
<body>
    <h2>Liste des Abonnements</h2>
    <a href="addAbonnement.php" class="add-button">Add Abonnement</a>

    <?php if ($list->rowCount() > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Id Abonnement</th>
                    <th>Username</th>
                    <th>Cour</th>
                    <th>Type</th>
                    <th>methode</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $abonnement): ?>
                    <tr>
                        <td><?php echo $abonnement['Id_abonnement']; ?></td>
                        <td><?php echo $abonnement['username']; ?></td>
                        <td><?php echo $abonnement['cour']; ?></td>
                        <td><?php echo $abonnement['type']; ?></td>
                        <td><?php echo $abonnement['methode']; ?></td>
                        <td>
                            <form method="POST" action="updateAbonnement.php">
                                <input type="submit" name="update" class="update-link" value="UPDATE">
                                <input type="hidden" value=<?PHP echo $abonnement['Id_abonnement']; ?> name="id_abonnement">
                            </form>
                         </td>
                        <td> <a href="deleteAbonnement.php?Id_Abonnement=<?php echo $abonnement['Id_abonnement']?>" class="delete-link" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet abonnement ?')"> DELETE </a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-abonnements">Aucun abonnement trouvé.</p>
    <?php endif; ?>
</body>
</html>
