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
    <main class="bg-transparent">

        <!-- PHP -->
        <?php
        $productId = $_GET['productId'];            // 1. Récupérer l'id transmis par le formulaire en GET 
        $article = getArticleFromId($productId);    // 2. Récupérer le produit qui correspond a cet id
        // var_dump($productId);                     // Je teste ma variable
        // var_dump($article);                       // Je teste ma variable
        ?>


        <!-- section details produit 
        ======================= -->
        <section class="pt-5 d-flex align-items-center justify-content-center vh-100" id="details-produit">
            <?php
                echo'<div class="container m-3">
                        <div class="row justify-content-center flex-nowrap grid gap-1 rounded border-info-subtle" id="details-produit_row">
                            <div class="col-md-6 text-white p-0">
                                <div class="card text-light border-dark rounded p-4" id="card-home_detail_produit">
                                    <p class="mt-2 text-light" id="prix">' . $article['prix'] . ' €</p>
                                    <h5 class="card-title text-light">' . $article['nom'] . '</h5>
                                    <p class="card-text pt-2 text-light" id="description">' . $article['description'] . '</p>
                                    <p class="card-text pt-2 text-light" id="description_detaillee">' . $article['description_detaillee'] . '</p>
                                    <div class="d-flex justify-content-between">

                                        <form method="GET" action="./panier.php" class="d-flex">
                                            <input type="hidden" name="productId" value="' . $article['id'] . '">
                                            <input type="submit" class="btn btn-outline-light mt-2 border-info-subtle" value="Ajouter au panier" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        </form>

                                    </div>
                                </div>
                        
                            </div>

                            <div class="col-md-6 d-flex align-items-center p-0 border-dark rounded" id="image_details_produit">
                                <div class="container container-full-height d-flex justify-content-center align-items-center p-4">
                                <img src="./images/' . $article['image'] . '" class="card-img-top" alt="montre" id="image-card">
                                </div>
                            </div>

                        </div>
                    </div>';
            ?>
        </section>

    </main>


    <!-- footer 
    ======================= -->
    <?php
    include 'footer.php' // inclusion fichier footer.php
    ?>


</body>