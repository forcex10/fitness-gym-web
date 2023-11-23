function ValiderAll(){
    validerNom();
    validerTempsEntrainement();
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




  function validerTempsEntrainement() {
    const TempsEntrainement = document.getElementById("horaires").value;
    const erreurTime = document.getElementById("erreurHoraire");
    if(TempsEntrainement==""){
      erreurTime.innerHTML =
      "il faut remplir ce champ";
    } else {
      erreurTime.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  

  function DescriptionCour(){
    var DescCour = document.getElementById("descCours").value;
      const erreurDesc = document.getElementById("erreurDescours");
    if(DescCour==''){
      erreurDesc.innerHTML =
      "il faut remplir ce champ";
    } else {
      erreurDesc.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  ajouter.addEventListener("click", ValiderAll);
  