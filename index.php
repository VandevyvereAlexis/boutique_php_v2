<!-- inclusion 
======================= -->
<?php
include 'functions.php';    // inclusion fichier des fonctions --> appeler les fonctions concernées sur ce fichier. 
include 'head.php';         // inclusion du head.
session_start();            // initialiser la session et accéder à la superglobal $_SESSION 'tableau associatif'.
createCart();               // initialiser le panier.
// var_dump($_SESSION);
if (isset($_POST['vider_panier'])) {
    viderPanier();
}
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


        <!-- accueil 
        ======================= -->
        <div class="container-fluid" id="image_fond">
            <div class="row">
                <div class="col text-center mt-5">
                    <!-- Titre -->
                    <h1 class="text-light text-center mt-5 pt-5"><span class="fw-bolder">Bienvenue dans l'univers du temps raffiné</span><br> Explorez notre collection de montres exquises !</h1>
                    <!-- button -->
                    <div class="mt-5">
                        <a href="#articles" class="p-3 text-light">Découvrez notre collection</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- section articles 
        ======================= -->
        <section id="articles">
            <div class="container-fluid mt-4">

                <!-- titre section -->
                <h2 class="text-light m-5">Notre collection</h2>

                <div class="row">
                    <!-- PHP -->
                    <?php
                    $articles = getArticles();  // déclaration variable contenant mon tableau d'articles. création variable '$articles', sa valeur est le tableau d'article renvoyé par la fonction 'getArticles()'.
                    // var_dump($articles);     // teste variable pour vérifier que j'ai bien mes 3 articles.
                    // var_dump($_SESSION);     // ajout de l'article au panier et test du résultat.

                    foreach ($articles as $article) {   // lancement de ma boucle pour afficher une carte boostrap par article.
                        echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card bg-dark text-light border border-secondary" id="card-home">

                                <p class="card-text ms-3 mt-2">' . $article['prix'] . '€</p>
                                <img src="./images/' . $article['image'] . '" class="card-img-top mx-auto p-4 pt-4 mb-4" alt="..." id="image-card">

                                    <div class="card-body border border-secondary">

                                        <h5 class="card-title">' . $article['nom'] . '</h5>
                                        <p class="card-text">' . $article['description'] . '</p>

                                        <div class="d-flex justify-content-between">

                                            <form method="GET" action="./produit.php">
                                                <input type="hidden" name="productId" value="' . $article['id'] . '">
                                                <input type="submit" class="btn btn-outline-light" value="Détails produit" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                            </form>

                                            <form method="GET" action="./panier.php" class="d-flex">
                                                <input type="hidden" name="productId" value="' . $article['id'] . '">
                                                <input type="submit" class="btn btn-outline-light" value="Ajouter au panier" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>';
                    }
                    ?>

                </div>

            </div>
        </section>

    </main>



    <!-- footer 
    ======================= -->
    <?php
    include 'footer.php' // inclusion fichier footer.php
    ?>

</body>