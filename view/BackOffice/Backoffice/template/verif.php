<?php

// Fonction de validation du nom
function validerNom($nom) {
    return preg_match('/^[A-Za-z]*$/', $nom);
}

// Fonction de validation du prénom
function validerPrenom($prenom) {
    return preg_match('/^[A-Za-z]*$/', $prenom);
}

// Fonction de validation de l'email
function validerEmail($email) {
    return preg_match('/^[a-zA-Z0-9._-]+@gmail\.com$/', $email);
}
function validerContenu($contenu) {
    return !preg_match('/(fuck|shit)/', $contenu);
}

?>
