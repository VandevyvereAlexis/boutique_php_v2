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
    <main class="bg-dark">

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
                <div class="card mb-3 text-center bg-dark">
                    <!-- image produit -->
                    <img src="./images/<?= $article['picture'] ?>" class="card-img-top mx-auto" alt="..." style="width: 100px">
                    <!-- nom produit -->
                    <h5 class="card-title text-light"><?= $article['name'] ?></h5>
                    <!-- détails produit -->
                    <p class="card-text text-light"><?= $article['price'] ?>€</p>
                    <p class="card-text text-light"><?= $article['description'] ?></p>
                    <p class="card-text text-light"><small class="text-light"><?= $article['detailleDescription'] ?></small></p>

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