<!-- inclusion 
======================= -->
<?php
    session_start();                    // on demarre la sessions PHP "initialisation de la session, accès à la superglobal $_SESSION (tableau associatif)".

    include 'functions.php';            // inclusion fichier des fonctions --> appeler les fonctions concernées sur ce fichier.
    include 'head.php';                 // inclusion du head.
    
    createCart();                       // initialiser le panier.
?>





<!-- body 
======================= -->
<body>





    <!-- header 
    ======================= -->
    <?php
        include 'header.php';       // inclusion fichier header.php
    ?>





    <!-- main 
    ======================= -->
    <main>


        <!-- PHP -->
        <?php
            $productId = $_GET['productId'];            // 1. Récupérer l'id transmis par le formulaire en GET 
            $article = getArticleFromId($productId);    // 2. Récupérer le produit qui correspond a cet id
        ?>


        <!-- section details produit 
        ======================= -->
        <section class="d-flex align-items-center justify-content-center vh-100 pt-5" id="details-produit">

            <?php
                echo'<div class="container m-1">
                        <div class="row justify-content-center flex-nowrap grid gap-1 my-5" id="details-produit_row">
                            <div class="col-md-6 text-white p-0">

                                <div class="card text-light border-secondary rounded p-4" id="card_details_produit">

                                    <p class="mt-2 text-light">' . $article['prix'] . ' €</p>
                                    <h5 class="card-title text-light">' . $article['nom'] . '</h5>
                                    <p class="card-text pt-2 text-light">' . $article['description'] . '</p>
                                    <p class="card-text pt-2 text-light">' . $article['description_detaillee'] . '</p>

                                    <form method="GET" action="./panier.php">
                                        <input type="hidden" name="productId" value="' . $article['id'] . '">
                                        <input type="submit" class="btn btn-outline-light border-info-subtle mt-2" value="Ajouter au panier" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                    </form>

                                </div>

                            </div>

                            <div class="col-md-6 d-flex align-items-center border border-secondary rounded" id="image_details_produit">
                                <div class="container d-flex justify-content-center align-items-center p-4">
                                    <img src="./images/' . $article['image'] . '"alt="montre">
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