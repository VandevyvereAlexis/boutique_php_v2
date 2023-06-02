<?php
// J'inclus le fichier des functions pour pouvoir les appeler ici
include 'functions.php';
// permet d'initialiser la session et accéder à la superglobal $_SESSION ( tableau associatif )
session_start();
// initialiser panier 
createCart();
// var_dump($_SESSION);
// J'inclus le head avec les balises de base + la balise head ( pour ne pas répéter le code qu'il contient)
include 'head.php';
?>

<body>
    <?php
    include 'header.php';
    ?>

    <main class="bg-dark">


        <!-- Section 1 -->
        <section id="image_fond">
            <div class="container-fluid">
            </div>
        </section>


        <!-- Section 2 -->
        <section id="produits">
            <div class="container-fluid mt-4">
                <div class="row">
                        <?php
                        // Je déclare la variable qui contient mon tableau d'articles. Sa valeur, c'est le tableau d'articles renvoyé par la fonction getArticle()
                        $articles = getArticles();
                        // var_dump($articles); // Je teste cette variable pour vérifier que j'ai bien mes 3 articles
                        // var_dump($_SESSION); // Ajouter l'article au panier et tester le résultat
                        // Je lance ma boucle pour afficher une carte boostrap par article 
                        foreach ($articles as $article) {
                            echo    "<div class=\"col-lg-3 col-md-4 col-sm-6 mb-4\">
                                        <div class=\"card bg-dark text-light border border-secondary\" id=\"card-home\">
                                        <p class=\"card-text ms-3 mt-2\">" . $article['price'] . "€</p>
                                            <img src=\"./images/" . $article['picture'] . "\" class=\"card-img-top mx-auto p-4\" alt=\"...\" id=\"image-card\">
                                            <div class=\"card-body\">
                                                <h5 class=\"card-title\">" . $article['name'] . "</h5>
                                                <p class=\"card-text\">" . $article['description'] . "</p>
                                                <div class=\"d-flex justify-content-between\">
                                                    <form method=\"GET\" action=\"./produit.php\">
                                                        <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
                                                        <input type=\"submit\" class=\"btn btn-outline-light\" value=\"Détails produit\" style=\"--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\">
                                                    </form>
                                                    <form method=\"GET\" action=\"./panier.php\" class=\"d-flex\">
                                                        <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
                                                        <input type=\"submit\" class=\"btn btn-outline-light\" value=\"Ajouter au panier\" style=\"--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>



    </main>

    <?php
    include 'footer.php'
    ?>
</body>