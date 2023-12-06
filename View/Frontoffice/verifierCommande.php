<?php 
 include_once "C:/xampp/htdocs/fitness-gym-web/Controller/CommandeC.php";
 $commandeC=new CommandeC();
 $commandeC->updateCommande2($_GET['id_commande']);
?>



<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de commande</title>
    <script>
        // Attendre 5 secondes avant la redirection
        setTimeout(function() {
            // Rediriger vers index.php
            window.location.href = 'index.php';
        }, 5000); // 5000 millisecondes = 5 secondes

        // Code pour afficher le message
        window.onload = function() {
            // Afficher le message "Votre commande a été confirmée"
            var message = document.createElement('div');
            message.textContent = "Votre commande a été confirmée";
            alert(message.textContent);
        };
    </script>
</head>
<body>
    <!-- Contenu de la page -->
</body>
</html>
