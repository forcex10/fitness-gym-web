const descriptionInput = document.getElementById("typedescription");
const bouton = document.getElementById("bouton1");
const nomInput = document.getElementById("typename");
 
function validertype() {
    validerNomtype();
    validerDescription();
}

function validerNomtype() {
    const nomValeur = nomInput.value;
    const nomRegex = /^[A-Za-z]+$/;
    const erreurNom = document.getElementById("erreurnomtype");

    if (!nomValeur.match(nomRegex)) {
        erreurNom.innerHTML = "Veuillez entrer un nom valide (lettres uniquement)";
    } else {
        erreurNom.innerHTML = "<span style='color:green'> Correct </span>";
    }
}





function validerDescription() {
   const longueurMinimale = 10;
   const descriptionValeur = descriptionInput.value;
   const erreurDescription = document.getElementById("erreurdescriptiontype");
  

   if (descriptionValeur.length < longueurMinimale) {
       erreurDescription.innerHTML = "La description doit contenir au moins 10 caractères.";
   } else {
   
       erreurDescription.innerHTML = "<span style='color:green'>Correct</span>";
   }
  
}
function effacerMessagesErreurtype() {
   document.getElementById("erreurnomtype").innerHTML = "";
   document.getElementById("erreurdescriptiontype").innerHTML = "";  
}

bouton.addEventListener("click", validertype); // Supprimez les parenthèses ici