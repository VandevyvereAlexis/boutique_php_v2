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
<body>


    <!-- header 
    ======================= -->
    <?php
    include 'header.php';   // inclusion fichier header.php
    ?>


    <!-- main 
    ======================= -->
    <main class="bg-dark pt-4">
        <h1 class="text-light pt-5 text-center">Détails produit</h1>

        <!-- PHP -->
        <?php
        $productId = $_GET['productId'];            // 1. Récupérer l'id transmis par le formulaire en GET 
        $article = getArticleFromId($productId);    // 2. Récupérer le produit qui correspond a cet id
        //var_dump($productId);                     // Je teste ma variable
        //var_dump($article);                       // Je teste ma variable
        ?>


        <!-- section detail produit 
        ======================= -->
        <section id="detail-produit">
            <div class="container" id="produit_card" style="height: 100vh">

                <!-- titre section -->
                <h2><?= $article['name']?></h2>
                <!-- card -->
                <div class="card mb-3 text-center bg-dark border border-secondary p-5">
                    <!-- image produit -->
                    <img src="./images/<?= $article['picture'] ?>" class="card-img-top mx-auto pb-4" alt="..." style="width: 200px">
                    <!-- nom produit -->
                    <h5 class="card-title text-light border-top border-secondary pt-3"><?= $article['name'] ?></h5>
                    <!-- détails produit -->
                    <p class="card-text text-light"><?= $article['price'] ?>€</p>
                    <p class="card-text text-light"><?= $article['description'] ?></p>
                    <p class="card-text text-light"><small class="text-light"><?= $article['detailleDescription'] ?></small></p>
                    <!-- button ajout panier -->
                    <form method="GET" action="./panier.php" class="d-flex">
                        <input type="hidden" name="productId" value="' . $article['id'] . '">
                        <input type="submit" class="btn btn-outline-light mx-auto mt-4 p-3" value="Ajouter au panier" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    </form>

                </div>

            </div>
        </section>

    </main>



    <!-- footer 
    ======================= -->
    <?php
    include 'footer.php'    // inclusion fichier footer.php
    ?>

</body>