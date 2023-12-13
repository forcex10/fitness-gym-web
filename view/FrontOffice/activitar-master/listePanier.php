<?php
session_start();
    include "C:/xampp/htdocs/fitness-gym-web/Controller/PanierC.php";
    include "C:/xampp/htdocs/fitness-gym-web/Controller/produitC.php";
    include "C:/xampp/htdocs/fitness-gym-web/Model/Panier.php";
    //id du client a faire
    $id_client=$_SESSION['id'];
    $produitC=new produitC();
    $panierC = new PanierC();
    $list = $panierC->showPanierClient($id_client);
    $quant=0;
    foreach ($list as $p ) : 
        $quant+=$p['quantite']; 
    endforeach;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['update']) ) {
            foreach($list as $l) : 
                if(isset($_POST['totale1_'.$l['id_panier']]) && isset($_POST['quantite_'.$l['id_panier']])){
                $panier=new Panier(null,$id_client,$l['id_produit'],$_POST['quantite_'.$l['id_panier']],$_POST['totale1_'.$l['id_panier']]);
                $produit=$produitC->showproduit($l['id_produit']);
                $produit['quantite']+=$l['quantite'];
                $produit['quantite']-=$_POST['quantite_'.$l['id_panier']];
                $produitC->updateproduit2($produit,$l['id_produit']);
                $panierC->updatePanier($panier, $l['id_panier']);
                if($_POST['quantite_'.$l['id_panier']]==0){
                    $panierC->deletePanier($l['id_panier']);
                }
                header('Location:listePanier.php');}

                if(!isset($_POST['totale1_'.$l['id_panier']])){ echo ("whyyyyyyyyyyy");}

            endforeach;
        }
      }
      
?>


<!DOCTYPE html>
<html lang="zxx"><head>
    
    <meta charset="UTF-8">
    <meta name="description" content="Activitar Template">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activitar | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&amp;display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">


<style>
    .toti{
        color : white;
    }
    .toti2,.badge{
        color :#e4381C;
    }

    .toti:hover{
        color :white;
    }

    .quantity-btns {
    padding: 8px 16px;
    margin: 0 5px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    background-color: #3498db;
    color: white;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.quantity-btns:hover {
    background-color: #2980b9;
}
.quantity-input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

.quantity-input:focus {
    outline: none;
    border-color: #3498db;
}

.quantity-btns.increase {
    background-color: #2ecc71; /* Couleur de fond */
    color: white; /* Couleur du texte */
}

/* Style spécifique pour le bouton - */
.quantity-btns.decrease {
    background-color: #ff0000; /* Couleur de fond */
    color: white; /* Couleur du texte */
}

a.commander-btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    border-radius: 5px;
    background-color:#ff5100;
    color: white;
    text-decoration: none;
    font-size: 16px;
    transition: background-color 0.3s ease;
}
.sauvegarder{
    background-color:#ff5100;
    border: none;

}

/* Effet au survol du lien */
a.commander-btn:hover {
    background-color: #9c3d11;
}

.commander-btn-container {
    position: absolute;
    top: 450px; /* Ajustez la valeur en fonction de votre mise en page */
    right: 100px; /* Ajustez la valeur en fonction de votre mise en page */
    z-index: 999; /* Assurez-vous que le bouton est au-dessus des autres éléments si nécessaire */
}
/* Styles pour l'input de type number */
input[type="text"] {
  width: 100px; /* Largeur de l'input */
  padding: 8px; /* Espace intérieur */
  border: 1px solid #ccc; /* Bordure */
  border-radius: 4px; /* Coins arrondis */
  font-size: 16px; /* Taille de la police */
  outline: none; /* Supprime la bordure focus par défaut */
}

/* Styles pour les boutons augmenter et diminuer */
input[type="text"]::-webkit-inner-spin-button,
input[type="text"]::-webkit-outer-spin-button {
  margin: 0; /* Réduit la marge par défaut */
}

/* Styliser l'apparence des boutons dans certains navigateurs */
input[type="text"]::-webkit-inner-spin-button,
input[type="text"]::-webkit-outer-spin-button {
  height: auto; /* Ajuste la hauteur */
}
.no-ps{
    color : red;
}

    </style>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder" style="display: none;">
        <div class="loader" style="display: none;"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="container-fluid">
            <div class="logo">
                <a href="./index.html">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <div class="top-social">
                <a href="listePanier2.php"><img src="img/panier2.png"></a>
                <label class="badge" id="badge"><?php  echo $quant; ?></label>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="container">
                <div class="nav-menu">
                    <nav class="mainmenu mobile-menu">
                        <ul>
                        <li><a href="./index.php">Home</a></li>
                            <li><a href="./about-us.html">About us</a></li>
                            <li><a href="./schedule.html">Schedule</a></li>
                            <li ><a href="./gallery.php">Produits</a></li>
                            <li class="active"><a href="./forum.php">Forum</a></li>
                            <li><a href="./contact.html">Contacts</a></li>
                            <li><a href="./searchCours.php">Cours</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="mobile-menu-wrap"><div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: none;"><span class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a><nav class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
                        <ul>
                            <li><a href="./index.html" role="menuitem">Home</a></li>
                            <li><a href="./about-us.html" role="menuitem">About us</a></li>
                            <li class="active"><a href="./schedule.html" role="menuitem">Schedule</a></li>
                            <li><a href="./gallery.html" role="menuitem">Gallery</a></li>
                            <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row" style="outline: none;"><a href="./blog.html">Blog</a>
                                <span class="slicknav_arrow">►</span></a><ul class="dropdown slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                                    <li><a href="./about-us.html" role="menuitem" tabindex="-1">About Us</a></li>
                                    <li><a href="./blog-single.html" role="menuitem" tabindex="-1">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html" role="menuitem">Contacts</a></li>
                        </ul>
                    </nav></div></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg spad" data-setbg="img/about-bread.jpg" style="background-image: url(&quot;img/about-bread.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Votre Panier</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Class Time Section Begin -->
    <section class="classtime-section class-time-table spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Vos Produits</h2>
                    </div>
                </div>
            </div>
            <?php if (isset($list) && !empty($list)): $tot=0;?>
            <div class="row">
                <div class="classtime-table tablee">
                <form method="POST" action="">      
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Nom produit</th>
                                <th>Prix (DT)</th>
                                <th>Quantité</th>
                                <th>Total produit</th>
                            </tr>
                        </thead>
                        <tbody><?php foreach ($list as $p): $produit = $produitC->showproduit($p['id_produit']); $tot+=$p['totale']; ?>
                            <tr>
                                <td class="workout-time"> <img src="images/<?= $produit['image'] ?>" alt="Produit Image" class="product-image"></td>
                                <td class="hover-bg ts-item" >
                                    <h6><?php echo $produit['nom']; ?></h6>
                                </td>
                                
                                <td name="prix_<?php echo $p['id_panier']; ?>" id="prix_<?php echo $p['id_panier']; ?>" class="hover-bg ts-item prix" data-tsmeta="crossfit" >
                                    <h6><?php echo $produit['prix']; ?></h6>
                                </td>
                              
                                <td class="hover-bg ts-item quantity"  >
                                 
                            <input type="text" data-id="<?php echo $p['id_panier']; ?>" name="quantite_<?php echo $p['id_panier']; ?>" id="quantite_<?php echo $p['id_panier']; ?>" min="0" max="<?php echo $produit['quantite']+$p['quantite']; ?>" value="<?php echo $p['quantite']; ?>" class="quantity-input">
                                <button class="quantity-btns decrease"  data-id="<?php echo $p['id_panier']; ?>">-</button> 
                                <button class="quantity-btns increase"  data-id="<?php echo $p['id_panier']; ?>">+</button> 
                                </td>
            
                                <td class="hover-bg ts-item totale toti2" name="totale_<?php echo $p['id_panier']; ?>"  id="totale_<?php echo $p['id_panier']; ?>" >
                                    <h6 ><?php echo $p['totale']; ?> </h6>
                                </td>
                                <td hidden>
                                    <input type="hidden" value="<?php echo $p['totale']; ?>" id="totale1_<?php echo $p['id_panier']; ?>" name="totale1_<?php echo $p['id_panier']; ?>">
   
                                </td>
                                <td class="hover-bg ts-item" >
                                    <a href="deletePanier.php?id_panier=<?php echo $p['id_panier']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"><img src="img/corb2.png" alt="supp"></a>
                                </td>
                            </tr> <?php endforeach; ?>
                            <tr>
                                <td colspan="2">
                                <h4 class="toti"> Totale ( DT ) : </h4>
                                </td>
                                <td colspan="1">
                                <h3 class="tot toti" id="tot" name="tot"><img src="img/money.png"> <?php echo $tot; ?> </h3>
                                <td>
                                <input type="submit" name="update" class="btn btn-primary btn-fw sauvegarder" value="Sauvegarder">   
                                </td>
                                </td>
                                <td colspan="2">
                                <a class="commander-btn" href="addCommande.php?id_client=<?php echo $p['id_client']; ?>"> <img src="img/payment.png"> <br/>Commander ></a>
                                </td>

                            </tr>
                        </tbody>
                    </table></form>
                    
                         
                       
                    <?php else: ?>
                        <h2 class="no-ps">Votre panier est vide</h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <script>
       function updateTotal(id_panier) {
    var quantite = document.getElementById("quantite_" + id_panier).value;
    var prixProduit = document.getElementById("prix_"+id_panier).innerText;
    var tot = document.getElementById("tot").innerText;
    tot-= document.getElementById("totale_" +id_panier).innerText;
    var totale = quantite * prixProduit;
    tot+=totale;
    document.getElementById("totale_" +id_panier).innerText = totale;
    document.getElementById("totale1_" +id_panier).value = totale;
    document.getElementById("tot").innerHTML=tot;
}
        function increaseQuantity(event) {
            event.preventDefault();
            const id_panier = event.target.getAttribute('data-id');
            const quantiteInput = document.getElementById(`quantite_${id_panier}`);
            var quanti = document.getElementById("badge").innerText;
            const index = Array.from(increaseButtons).indexOf(event.target);
            const currentValue = parseInt(quantityInputs[index].value);
            const maxAllowed = parseInt(quantityInputs[index].getAttribute('max'));
            if (currentValue + 1 <= maxAllowed) {
                quantityInputs[index].value = currentValue + 1;
                quanti++;
                document.getElementById("badge").innerText=quanti;
                updateTotal(id_panier);
            }
        }

        function decreaseQuantity(event) {
            event.preventDefault();
            const id_panier = event.target.getAttribute('data-id');
            const quantiteInput = document.getElementById(`quantite_${id_panier}`);
            var quanti = document.getElementById("badge").innerText;
            const index = Array.from(decreaseButtons).indexOf(event.target);
            const currentValue = parseInt(quantityInputs[index].value);
            if (currentValue > 0) {
                quantityInputs[index].value = currentValue - 1;
                quanti--;
                document.getElementById("badge").innerText=quanti;
                updateTotal(id_panier);
            }
        }

// ... (votre code existant pour les écouteurs d'événements)

        // Sélection des boutons et de l'input
        const decreaseButtons = document.querySelectorAll('.quantity-btns.decrease');
        const increaseButtons = document.querySelectorAll('.quantity-btns.increase');
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const totale= document.querySelectorAll('.totale');

        // Ajout des écouteurs d'événements aux boutons
        decreaseButtons.forEach(button => {
            button.addEventListener('click', decreaseQuantity);
        });

        increaseButtons.forEach(button => {
            button.addEventListener('click', increaseQuantity);
        });
        quantityInputs.forEach(input => {
            input.addEventListener('input', function(event) {
                const id_panier = event.target.getAttribute('data-id');
                const index = Array.from(quantityInputs).indexOf(event.target);
                const maxAllowed = parseInt(event.target.getAttribute('max'));
                let currentValue = parseInt(event.target.value);

                if (currentValue > maxAllowed) {
                    currentValue = maxAllowed;
                } else if (currentValue < 0 || isNaN(currentValue)) {
                    currentValue = 0;
                }
                
                event.target.value = currentValue; // Mettre à jour la valeur dans l'input
                document.getElementById("badge").innerText=currentValue;

                updateTotal(id_panier);
            });
        });


    
    </script>
    <!-- Class Time Section End -->

    <!-- Classes Section Begin -->
    
    <!-- Classes Section End -->

    <!-- Choseus Section Begin -->
    
    <!-- Choseus Section End -->

    <!-- Cta Section Begin -->
    
    <!-- Cta Section End -->

    <!-- Footer Section Begin -->
    
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>


</body></html>