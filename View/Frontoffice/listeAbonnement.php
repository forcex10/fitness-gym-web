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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
        p.no-abonnements {
            color: #FF0000; /* Couleur rouge pour le texte */
            font-size: 18px; /* Taille de police plus grande */
            font-style: italic; /* Style d'écriture en italique */
            text-align: center; /* Alignement centré */
            margin-top: 20px; /* Marge en haut pour l'éloigner du tableau */
            }

        a.update-link,a.delete-link {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            border-radius: 4px;
            }

    a.update-link:hover,a.delete-link:hover {
    background-color: #555;
    }

    .add-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #45a049;
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
                        <td> <a href="updateAbonnement.php?Id_Abonnement=<?php echo $abonnement['Id_abonnement']?>" class="update-link"> UPDATE </a> </td>
                        <td> <a href="deleteAbonnement.php?Id_Abonnement=<?php echo $abonnement['Id_abonnement']?>" class="delete-link"> DELETE </a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-abonnements">Aucun abonnement trouvé.</p>
    <?php endif; ?>
</body>
</html>
