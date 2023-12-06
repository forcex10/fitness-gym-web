<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-danger">Récupération de mot de passe</title>
    <style>
        body {
            background-image: url('photos/mdp.jpg');
            background-size: cover;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

       
    </style>
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-danger">Récupération de mot de passe</h2>

        <form action="mail.php" method="post">
            <label class="text-danger" for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required>

            <!-- Ajouter d'autres champs au besoin -->
            
            <button type="submit" name="send">Réinitialiser le mot de passe</button>
        </form>
    </div>
</body>
</html>