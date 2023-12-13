const bouton = document.getElementById("send");
 const nomInput = document.getElementById("nom");
 const emailInput = document.getElementById("email");
 const messgeInput = document.getElementById("message");
 






function validerEmail() {
    const emailValeur = emailInput.value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const erreurEmail = document.getElementById("erreuremail");

    if (!emailValeur.match(emailRegex)) {
        erreurEmail.innerHTML = "Veuillez entrer une adresse email valide.";
    } else {
        erreurEmail.innerHTML = "<span style='color:green'>Correct</span>";
    }
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
    const descriptionValeur = messgeInput.value;
    const erreurDescription = document.getElementById("erreurmessage");
   

    if (descriptionValeur.length < longueurMinimale) {
        erreurDescription.innerHTML = "La description doit contenir au moins 10 caractères.";
    } else {
    
        erreurDescription.innerHTML = "<span style='color:green'>Correct</span>";
    }
   
}