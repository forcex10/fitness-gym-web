<?php





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération de mot de passe</title>
</head>
<body>

    <center><h2>Récupération de mot de passe</h2>

    <form action="mail.php" method="post">
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>

        <!-- Ajouter d'autres champs au besoin -->
        
        <button type="submit" name="send">Réinitialiser le mot de passe</button>
</center>
    </form>

</body>
</html>