<!-- inclusion 
======================= -->
<?php
    // on demarre la sessions PHP
session_start();            // initialiser la session et accéder à la superglobal $_SESSION 'tableau associatif'.
include 'functions.php';    // inclusion fichier des fonctions --> appeler les fonctions concernées sur ce fichier.
include 'head.php';         // inclusion du head.
createCart();               // initialiser le panier.
?>



<!-- body 
======================= -->
<body class="bg-dark">


    <!-- header 
    ======================= -->
    <?php
    include 'header.php';   // inclusion fichier header.php
    ?>


    <!-- main 
    ======================= -->
    <main class="pt-5" id="main_panier">
        <!-- Titre -->
        <h1 class="text-light pt-3 text-center">Votre panier</h1>

        <!-- PHP -->
        <?php 
            if (isset($_POST['newQuantity'])) {                 // si je vient d'un changement de quantite
                updateQuantity();                               // Je declenche la fonction de chnagement de quantite
            }
            if (isset($_GET['productId'])) {                    // si je viens d'un bouton d'ajout : je déclenche l'ajout 
                $productId = $_GET['productId'];                // 1. Récupérer l'id transmis par le formulaire en GET
                //var_dump($productId);                         // Je teste ma variable
                $article = getArticleFromId($productId);        // 2. Récupérer le produit qui correspond a cet id
                //var_dump($article);                           // Je teste ma variable
                addToCart($article);                            // 3. Ajouter l'article au panier et tester le résultat
            }
            if (isset($_POST['deletedArticleId'])) {            // fonction supression article
                deletedArticle($_POST['deletedArticleId']);
            }
            if (isset($_POST['viderPanier'])) {                 // fonction supression panier
                viderPanier();
            }


            foreach ($_SESSION['panier'] as $articlePanier) {
                echo'<div class="container mb-3 mt-5 p-2 mx-auto border border-secondary rounded" id="container-panier">
                        <div class="row align-items-center">

                            <div class="col-md-2 text-center border-end">
                                <img src="./images/' . $articlePanier['image'] . '" alt="...">
                            </div>

                            <div class="col-md-2 text-center">
                                <h4 class="fs-6 m-0 text-light">' . $articlePanier['description'] . '</h4>
                            </div>

                            <div class="col-md-2 text-center">
                                <h4 class="fs-6 m-0 text-light">' . $articlePanier['prix'] . '€</h4>
                            </div>

                            <form method="POST" action="./panier.php" class="col-md-3 d-flex align-items-center justify-content-between">

                                <input type="hidden" name="modifiedArticleId" value="' . $articlePanier['id'] . '">
                                <input class="col-3 offset-2 m-0 text-center bg-transparent text-light border-secondary rounded rounded border-1" type="number" min="1" max="10" name="newQuantity" value="' . $articlePanier['quantite'] . '">

                                <button type="submit" class="btn bg-transparent text-light border-secondary rounded border-1">
                                    Modifier
                                </button>

                            </form>

                            <form class="col-md-3 text-center" action="./panier.php" method="post">

                                <input type="hidden" name="deletedArticleId" value="' . $articlePanier['id'] . '">

                                <button type="hidden" class="bg-transparent border border-0 mt-lg-8">
                                    <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #ff2600;"></i>
                                </button>

                            </form>
                                
                        </div>
                    </div>';
            }
        ?>


        <!-- section total panier 
        ======================= -->
        <section id="total-panier">
            <div class="container">
                <div class="row">
                    <!-- total panier -->
                    <h4 class="text-light fs-4 mt-3 text-center">Total du panier : <?=totalPanier()?>€</h4>
                </div>
            </div>
        </section>


        <!-- section supression panier 
        ======================= -->
        <section id="supression-panier">
            <div class="container mt-4">
                <?php
                    if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                        echo'<div class="container d-flex justify-content-center pb-2">
                                <form class="col-lg-2" action="panier.php" method="post">

                                    <button type="submit" class="btn btn-danger me-4" name="viderPanier">
                                        Vider le panier
                                    </button>

                                </form>
                                
                                    <a href="./validation.php">
                                        <button type="submit" class="btn btn-light">
                                            Valider le panier
                                        </button>
                                    </a>
                                    
                            </div>';
                    }
                ?>
            </div>
        </section>

    </main>



    <!-- footer 
    ======================= -->
    <?php
    include 'footer.php'    // inclusion fichier footer.php
    ?>

</body>