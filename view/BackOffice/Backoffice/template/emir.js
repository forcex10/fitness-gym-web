const bouton = document.getElementById("bouton");
 const nomInput = document.getElementById("exampleInputName1");
 const descriptionInput = document.getElementById("exampleTextarea1");
 const prixInput = document.getElementById("exampleInputMobile");
 const quantiteInput = document.getElementById("exampleInputMobilee");

 
 function valider() {
    effacerMessagesErreur();
     validerNom();
     validerDescription();
     validerPrix();
     validerQuantite();
 }
 
 function validerNom() {
     const nomValeur = nomInput.value;
     const nomRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ]+$/;
     const erreurNom = document.getElementById("erreurnom");
     
 
     if (!nomValeur.match(nomRegex)) {
        
         erreurNom.innerHTML = "Veuillez entrer un nom valide (lettres uniquement)";
     } else {
       
         erreurNom.innerHTML = "<span style='color:green'> Correct </span>";
     }
     
 }
 
 function validerDescription() {
     const longueurMinimale = 10;
     const descriptionValeur = descriptionInput.value;
     const erreurDescription = document.getElementById("erreurdescription");
    
 
     if (descriptionValeur.length < longueurMinimale) {
         erreurDescription.innerHTML = "La description doit contenir au moins 10 caractères.";
     } else {
     
         erreurDescription.innerHTML = "<span style='color:green'>Correct</span>";
     }
    
 }
 
 function validerPrix() {
     const prixValeur = parseFloat(prixInput.value);
     const prixMax = 1000;
     const erreurPrix = document.getElementById("erreurprice");
    
 
     if (isNaN(prixValeur) || prixValeur < 0) {
         erreurPrix.innerHTML = "Le prix doit être un nombre valide et supérieur ou égal à zéro.";
     } else if (prixMax && prixValeur > prixMax) {
         erreurPrix.innerHTML = "Le prix ne peut pas dépasser " + prixMax + ".";
     } else {
      
         erreurPrix.innerHTML = "<span style='color:green'>Correct</span>";
     }
     
 }
 
 function validerQuantite() {
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
 function effacerMessagesErreur() {
    document.getElementById("erreurnom").innerHTML = "";
    document.getElementById("erreurdescription").innerHTML = "";
    document.getElementById("erreurprice").innerHTML = "";
    document.getElementById("erreurstock").innerHTML = "";
   
}
 
 bouton.addEventListener("click", valider); // Supprimez les parenthèses ici