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
<body class="bg-dark">


    <!-- header 
    ======================= -->
    <?php
    include 'header.php';   // inclusion fichier header.php
    ?>



    <!-- main 
    ======================= -->
    <main class="mt-5 pt-4" id="main_gammes">

        <?php
            $gammes = getGamme();
            // var_dump($gammes);
        ?>


        <?php
        foreach ($gammes as $gamme) {
            echo'<div class="container-fluid bg-transparent p-0" id="titre_gamme">
                    <h2 class="text-light border border-secondary text-center rounded m-0 mt-1 mb-4 p-3 mx-3">' . $gamme['nom'] . '</h2>
                </div>';

                $articles = getArticlesByGamme($gamme['id']);
                echo'<section id="articles">
                        <div class="container-fluid">
                            <div class="row align-items-center pt-4">';

                            foreach ($articles as $article) { 
                                echo'<div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                                        <div class="card bg-transparent text-light border-dark" id="card-home">

                                            <p class="position-absolute border border-info-subtle rounded p-1 px-2 mt-2 ms-2 fs-6" id="prix">' . $article['prix'] . ' €</p>
                                            <img src="./images/' . $article['image'] . '" class="card-img-top mx-auto my-5" alt="montre" id="image-card">

                                            <div class="card-body bg-dark border-top border-info-subtle rounded">

                                                <h5 class="card-title">' . $article['nom'] . '</h5>
                                                <p class="card-text pt-2" id="description">' . $article['description'] . '</p>

                                                <div class="d-flex justify-content-between">

                                                    <form method="GET" action="./produit.php">
                                                        <input type="hidden" name="productId" value="' . $article['id'] . '">
                                                        <input type="submit" class="btn btn-outline-light mt-2 border-info-subtle" value="Détails produit" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                    </form>

                                                    <form method="GET" action="./panier.php" class="d-flex">
                                                        <input type="hidden" name="productId" value="' . $article['id'] . '">
                                                        <input type="submit" class="btn btn-outline-light mt-2 border-info-subtle" value="Ajouter au panier" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div>';
                            }

                            echo
                            '</div>
                        </div>
                    </section>';
        }
        ?>
    </main>







    <!-- footer 
    ======================= -->
    <?php
    include 'footer.php' // inclusion fichier footer.php
    ?>

</body>