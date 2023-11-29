const bouton = document.getElementById("bouton");
 const nomInput = document.getElementById("typename");

 const quantiteInput = document.getElementById("typestock");
 
 function validertype() {
     validerNomtype();
   
     
     validerQuantitetype();
 }
 
 function validerNomtype() {
     const nomValeur = nomInput.value;
     const nomRegex = /^[A-Za-z]+$/;
     const erreurNom = document.getElementById("erreurnom");
 
     if (!nomValeur.match(nomRegex)) {
         erreurNom.innerHTML = "Veuillez entrer un nom valide (lettres uniquement)";
     } else {
         erreurNom.innerHTML = "<span style='color:green'> Correct </span>";
     }
 }
 
 
 
 
 
 function validerQuantitetype() {
     const quantiteValeur = parseInt(quantiteInput.value);
     const quantiteMax = 1000;
     const erreurQuantite = document.getElementById("erreurstock");
 
     if (isNaN(quantiteValeur) || quantiteValeur < 0) {
         erreurQuantite.innerHTML = "La quantité doit être un nombre entier valide et supérieure ou égale à zéro.";
     } else if (quantiteMax && quantiteValeur > quantiteMax) {
         erreurQuantite.innerHTML = "La quantité ne peut pas dépasser " + quantiteMax + ".";
     } else {
         erreurQuantite.innerHTML = "<span style='color:green'>Correct</span>";
     }
 }
 
 bouton.addEventListener("click", validertype); // Supprimez les parenthèses ici