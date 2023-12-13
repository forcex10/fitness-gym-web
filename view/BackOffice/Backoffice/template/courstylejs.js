function ValiderAll() {
    validerNom();
    validerTempsEntrainement();
    DescriptionCour();
  }
function reseterALL() {

    validersupNom();
    validersupEntrainement();
}

  var ajouter = document.getElementById("but-ajt");
  var reset = document.getElementById("reset");
  
  function validersupNom() {
    const erreurNom = document.getElementById("erreurNom");
    erreurNom.innerHTML = "";
  }

  function validersupEntrainement() {
    const erreurDesc = document.getElementById("erreurDescours");
    erreurDesc.innerHTML = "";

  }
  
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
  
  // Add event listeners inside ValiderAll function
  function addEventListeners() {
    var nomCours = document.getElementById("nomCours");
    var DescCour = document.getElementById("descCours");
    
  
    nomCours.addEventListener("keyup", validerNom);
    DescCour.addEventListener("keyup", DescriptionCour);
    ajouter.addEventListener("click", ValiderAll);
    reset.addEventListener("click", reseterALL);
  }
  
  // Call the function to add event listeners
  addEventListeners();
  