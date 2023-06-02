<?php
// J'inclus le fichier des functions pour pouvoir les appeler ici
include 'functions.php';
session_start();
// J'inclus le head avec les balises de base + la balise head ( pour ne pas répéter le code qu'il contient )
include 'head.php';
// initialiser panier 
createCart();
?>

<body>
    <?php
    include 'header.php';
    ?>

    <main>

        <?php
            // si je vient d'un changement de quantite 
            if (isset($_POST['newQuantity'])) {
                // Je declenche la fonction de chnagement de quantite
                updateQuantity();
            }
            // si je viens d'un bouton d'ajout : je déclenche l'ajout
            if (isset($_GET['productId'])) {
                // 1. Récupérer l'id transmis par le formulaire en GET 
                $productId = $_GET['productId'];
                //var_dump($productId); // Je teste ma variable
                // 2. Récupérer le produit qui correspond a cet id
                $article = getArticleFromId($productId);
                //var_dump($article); // Je teste ma variable
                // 3. Ajouter l'article au panier et tester le résultat
                addToCart($article);
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
                echo    "<div class=\"container mb-3 mt-3 p-3 mx-auto\" id=\"container-panier\">
                            <div class=\"row align-items-center\">
                                <div class=\"col-md-2 text-center\">
                                    <img src=\"./images/" . $articlePanier['picture'] . "\" alt=\"...\" style=\"width: 100px\">
                                </div>
                                <div class=\"col-md-2 text-center\">
                                    <h4 class=\"fs-6 m-0\">" . $articlePanier['name'] . "</h4>
                                </div>
                                <div class=\"col-md-2 text-center\">
                                    <h4 class=\"fs-6 m-0\">" . $articlePanier['price'] . "€</h4>
                                </div>
                                <form method=\"POST\" action=\"./panier.php\" class=\"col-md-2 d-flex align-items-center justify-content-between\">
                                    <input type=\"hidden\" name=\"modifiedArticleId\" value=\"" . $articlePanier['id'] . "\">
                                    <input class=\"col-3 offset-2\" type=\"number\" min=\"1\" max=\"10\" name=\"newQuantity\" value=\"" . $articlePanier['quantite'] . "\">
                                    <button type=\"submit\" class=\"col-5 offset-1 btn btn-light\">
                                        Modifier quantité
                                    </button>
                                </form>

                                <form class=\"col-lg-2\" action=\"panier.php\" method=\"post\">
                                    <input type=\"hidden\" name=\"deletedArticleId\" value=\"" . $articlePanier['id'] . "\">
                                    <button type =\"submit\" class=\"btn btn-danger mt-2 mt-lg-8\">
                                            Supprimer
                                    </button>
                                </form>
                                
                            </div>
                        </div>";
                    }
        ?>
                    <div class="container">
                        <div class="row">
                            <h4>Total du panier : <?=totalPanier()?>€</h4>
                        </div>
                    </div>

                    <div class="container">
                        <?php
                            if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                                echo    '<form class="col-lg-2" action="panier.php" method="post">
                                            <button type="submit" class="btn btn-danger mt-2 mt-lg-8" name="viderPanier">
                                                Vider le panier
                                            </button>
                                        </form>';
                            }
                        ?>
                    </div>

    </main>

    <?php
    include 'footer.php'
    ?>
</body>