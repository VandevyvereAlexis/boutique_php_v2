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
    <main class="pt-5" id="gammes">


        <?php
            $gammes = getGamme();

            foreach ($gammes as $gamme) {
                echo'<div class="container-fluid" id="titre_gamme">
                        <h1 class="text-light border rounded border-secondary text-center mt-5 p-3">' . $gamme['nom'] . '</h1>
                    </div>';

                $articles = getArticlesByGamme($gamme['id']);
                    echo'<section id="articles_gamme">
                            <div class="container-fluid">
                                <div class="row">';

                                foreach ($articles as $article) { 
                                    echo'<div class="col-lg-4 col-sm-6 mb-3">
                                            <div class="card bg-transparent text-light border-dark" id="card-gamme">

                                                <p class="position-absolute border border-info-subtle rounded p-1 px-2 mt-2 ms-2" id="prix">' . $article['prix'] . ' €</p>
                                                <img src="./images/' . $article['image'] . '" class="card-img-top mx-auto my-5" alt="montre">

                                                <div class="card-body bg-dark border-top rounded border-info-subtle">

                                                    <h5 class="card-title">' . $article['nom'] . '</h5>
                                                    <p class="card-text pt-2">' . $article['description'] . '</p>

                                                    <div class="d-flex justify-content-between">

                                                        <form method="GET" action="./produit.php">
                                                            <input type="hidden" name="productId" value="' . $article['id'] . '">
                                                            <input type="submit" class="btn btn-outline-light border-info-subtle mt-2 fs-6" value="Détails produit" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                        </form>

                                                        <form method="GET" action="./panier.php">
                                                            <input type="hidden" name="productId" value="' . $article['id'] . '">
                                                            <input type="submit" class="btn btn-outline-light border-info-subtle mt-2 fs-6" value="Ajouter au panier" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                        </form>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>';
                                }

                            echo'</div>
                            </div>
                        </section>';
            }
            
        ?>


    </main>





    <!-- footer 
    ======================= -->
    <?php
        include 'footer.php'        // inclusion fichier footer.php
    ?>





</body>