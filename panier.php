<!-- inclusion 
======================= -->
<?php
include 'functions.php';    // inclusion fichier des fonctions --> appeler les fonctions concernées sur ce fichier.
include 'head.php';         // inclusion du head.
session_start();            // initialiser la session et accéder à la superglobal $_SESSION 'tableau associatif'.
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
    <main style="height: 100vh;">

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
            if (isset($_POST['deletedArticleId'])) {
                //var_dump($_POST);
                $articlePanierId = $_POST['deletedArticleId'];
                deleteArticle($articlePanierId);
            }
            if (isset($_POST['viderPanier'])) {
                viderPanier();
            }


            foreach ($_SESSION['panier'] as $articlePanier) {
                echo'<div class="container mb-3 mt-5 p-3 mx-auto border border-secondary" id="container-panier">
                        <div class="row align-items-center">

                            <div class="col-md-2 text-center">
                                <img src="./images/' . $articlePanier['picture'] . '" alt="..." style="width: 100px">
                            </div>

                            <div class="col-md-2 text-center">
                                <h4 class="fs-6 m-0 text-light">' . $articlePanier['name'] . '</h4>
                            </div>

                            <div class="col-md-2 text-center">
                                <h4 class="fs-6 m-0 text-light">' . $articlePanier['price'] . '€</h4>
                            </div>

                            <form method="POST" action="./panier.php" class="col-md-3 d-flex align-items-center justify-content-between">

                                <input type="hidden" name="modifiedArticleId" value="' . $articlePanier['id'] . '">
                                <input class="col-3 offset-2 m-0" type="number" min="1" max="10" name="newQuantity" value="' . $articlePanier['quantite'] . '">

                                <button type="submit" class="btn btn-light">
                                    Modifier
                                </button>

                            </form>

                            <form class="col-md-3 text-center" action="panier.php" method="post">

                                <input type="hidden" name="deletedArticleId" value="' . $articlePanier['id'] . '">

                                <button type ="submit" class="btn btn-danger mt-lg-8">
                                    Supprimer
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
                    <h4 class="text-light fs-6 mt-3 text-center">Total du panier : <?=totalPanier()?>€</h4>
                </div>
            </div>
        </section>


        <!-- section supression panier 
        ======================= -->
        <section id="supression-panier">
            <div class="container mt-3">
                <?php
                    if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                        echo'<div class="container d-flex justify-content-center">
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