function ValiderAll(){
    validerNom();
    validerPrix();
    DescriptionCour();
  }
  
  var ajouter = document.getElementById("but-ajt");
  
  function validerNom() {
    var nomCours = document.getElementById("nomCours").value;
    const nomValeur = nomCours; 
    const nomRegex = /^[A-Za-z]+$/;
    const erreurNom = document.getElementById("erreurNom");
  
    if (!nomValeur.match(nomRegex)) {
      erreurNom.innerHTML = "Veuillez entrer un nom valide (lettres uniquement)";
    } else {
      erreurNom.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }

  function DescriptionCour() {
    var DescCour = document.getElementById("descCours").value;
    const erreurDesc = document.getElementById("erreurDescours");
    if (DescCour == "") {
      erreurDesc.innerHTML = "il faut remplir ce champ";
    } else {
      erreurDesc.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }

  var prixInput;
  function validerPrix() {
     prixInput = document.getElementById("prix");
    const prixValeur = parseFloat(prixInput.value);
    const prixMax = 1000;
    const erreurprix = document.getElementById("erreurprice");
   

    if (isNaN(prixValeur) || prixValeur < 0) {
      erreurprix.innerHTML = "Le prix doit être un nombre valide et supérieur ou égal à zéro.";
    } else if (prixMax && prixValeur > prixMax) {
      erreurprix.innerHTML = "Le prix ne peut pas dépasser " + prixMax + ".";
    } else {
     
      erreurprix.innerHTML = "<span style='color:green'>Correct</span>";
    }
    
}

  
  
  
  // Add event listeners inside ValiderAll function
  function addEventListeners() {
    
    var nomCours = document.getElementById("nomCours");
    var prixInput = document.getElementById("prix");
    var DescCour = document.getElementById("descCours");
  
    nomCours.addEventListener("keyup", validerNom);
    DescCour.addEventListener("keyup", DescriptionCour);
    prixInput.addEventListener("keyup", validerPrix);
    ajouter.addEventListener("click", ValiderAll);
  }
  
  // Call the function to add event listeners
  addEventListeners();
  