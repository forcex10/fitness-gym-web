<?php
require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";
$UserC= new UserC();
$list=$UserC->listClients();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('C:/xampp/htdocs/fitness-gym-web/view/photo/clientjpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        #userList {
            width: 80%;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        h1 {
            text-align: center;
            color: #4caf50;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        a {
            text-decoration: none;
            padding: 8px 12px;
            background-color: #4caf50;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div id="userList">
    <h1>Liste des Utilisateurs</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Type d'utilisateur</th>
            <th>Diplôme</th>
            <th>Projet récent</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
            foreach($list as $j) {
        ?>
            <tr>
                <td><?php echo $j['id_client'] ?></td>
                <td><?php echo $j['nom']?></td>
                <td><?php echo $j['prenom']?></td>
                <td><?php echo $j['email']?></td>
                <td><?php echo $j['tel']?></td>
                <td><?php echo $j['typee']?></td>
                <td><?php echo $j['diplome']?></td>
                <td><?php echo $j['projetRc']?></td>
                <td>
                    <!-- Ajoutez ici le lien pour l'update -->
                </td>
                <td>
                    <a href="deleteUser.php?id_client=<?php echo $j['id_client']?>">Delete</a>
                </td>
            </tr>
        <?php  
            }
        ?>
    </table>
</div>

</body>
</html>

</html>