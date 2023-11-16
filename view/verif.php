<?php 
function validerNom($nomValeur) {
    $nomRegex = '/^[A-Za-zÀ-ÖØ-öø-ÿ]+$/u'; // Ajout du modificateur 'u' pour prendre en charge l'UTF-8

    if (!preg_match($nomRegex, $nomValeur)) {
        return false; // Le nom n'est pas valide
    } else {
        return true; // Le nom est valide
    }
}

function validerDescription($descriptionValeur) {
    $longueurMinimale = 10;

    if (strlen($descriptionValeur) < $longueurMinimale) {
        return false; // La description ne contient pas au moins 10 caractères
    } else {
        return true; // La description est correcte
    }
}
function validerPrix($prixValeur, $prixMax) {
    if (!is_numeric($prixValeur) || $prixValeur < 0 || ($prixMax && $prixValeur > $prixMax)) {
        return false;  // Échec de la validation
    } else {
        return true;  // Validation réussie
    }
}
function validerQuantite($quantiteValeur, $quantiteMax) {
    if (!is_numeric($quantiteValeur) || $quantiteValeur < 0 || ($quantiteMax && $quantiteValeur > $quantiteMax)) {
        return false;  // Échec de la validation
    } else {
        return true;  // Validation réussie
    }
}