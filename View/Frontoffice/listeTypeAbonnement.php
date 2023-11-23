<?php
    include "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
    $TypeAbonnementC = new TypeAbonnementC();
    $list = $TypeAbonnementC->listTypeAbonnement();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Type D'Abonnements</title>
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
    <h2>Liste des Type Abonnements</h2>
    <a href="addTypeAbonnement.php" class="add-button">Ajouter un Type D'Abonnement</a>

    <?php if ($list->rowCount() > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Id_Type_Abonnement</th>
                    <th>nom</th>
                    <th>duree(mois)</th>
                    <th>prix(DT)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $abonnement): ?>
                    <tr>
                        <td><?php echo $abonnement['id_type_abo']; ?></td>
                        <td><?php echo $abonnement['nom']; ?></td>
                        <td><?php echo $abonnement['duree']; ?></td>
                        <td><?php echo $abonnement['prix']; ?></td>
                        <td>
                            <form method="POST" action="updateTypeAbonnement.php">
                                <input type="submit" name="update" class="update-link" value="UPDATE">
                                <input type="hidden" value=<?PHP echo $abonnement['id_type_abo']; ?> name="id_type_abo">
                            </form>
                         </td>
                        <td> <a href="deleteTypeAbonnement.php?id_type_abo=<?php echo $abonnement['id_type_abo']?>" class="delete-link" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet abonnement ?')"> DELETE </a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-abonnements">Aucun type d'abonnement trouvé.</p>
    <?php endif; ?>
</body>
</html>
