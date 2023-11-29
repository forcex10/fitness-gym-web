document.getElementById("email").addEventListener("keyup", function () {
  var email = document.getElementById("email").value;
  var emailErreur = document.getElementById("erreurEmail");

  var emailValide = /^[a-zA-Z0-9._-]+@gmail\.com$/.test(email);

  if (emailValide) {
    emailErreur.textContent = "Email valide";
    emailErreur.style.color = "green";
  } else {
    emailErreur.textContent = "Email invalide (entrez une adresse valide)";
    emailErreur.style.color = "red";
  }
});

document.getElementById("nom").addEventListener("keyup", function () {
  var nom = document.getElementById("nom").value;
  var nomErreur = document.getElementById("erreurNom");

  var nomValide = /^[A-Za-z]*$/.test(nom);

  if (nomValide) {
    nomErreur.textContent = "Nom valide";
    nomErreur.style.color = "green";
  } else {
    nomErreur.textContent = "Nom invalide (lettres uniquement)";
    nomErreur.style.color = "red";
  }
});

document.getElementById("prenom").addEventListener("keyup", function () {
  var prenom = document.getElementById("prenom").value;
  var prenomErreur = document.getElementById("erreurPrenom");

  var prenomValide = /^[A-Za-z]*$/.test(prenom);

  if (prenomValide) {
    prenomErreur.textContent = "Prénom valide";
    prenomErreur.style.color = "green";
  } else {
    prenomErreur.textContent = "Prénom invalide (lettres uniquement)";
    prenomErreur.style.color = "red";
  }
});
