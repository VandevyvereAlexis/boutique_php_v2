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

    <main class="mt-5">

    <div class="container-fluid" id="header-home">
        <h1 class="position-relative pt-5 mt-5 text-center text-light">Bienvenus</h1>
    </div>

        <div class="container-fluid">
            <div class="row">
                <?php
                    // Je déclare la variable qui contient mon tableau d'articles
                    // Sa valeur, c'est le tableau d'articles renvoyé par la fonction getArticle()
                    $articles = getArticles();

                    // Je teste cette variable pour vérifier que j'ai bien mes 3 articles
                    // var_dump($articles);
                    // 3. Ajouter l'article au panier et tester le résultat
                    var_dump($_SESSION);
                    // Je lance ma boucle pour afficher une carte boostrap par article 
                    foreach($articles as $article) {
                        echo    "<div class=\"card col-md-4 mt-2 bg-dark text-light p-0 ms-1 m-0\" id=\"card-home\">
                                    <img src=\"./images/" . $article['picture'] . "\" class=\"card-img-top mt-5 mx-auto\" alt=\"...\" id=\"image-card\">
                                    <div class=\"card-body\">
                                        <h5 class=\"card-title\">" . $article['name'] . "</h5>
                                        <p class=\"card-text\">" . $article['description'] . "</p>
                                        <form method=\"GET\" action=\"./produit.php\">
                                            <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
                                            <input type=\"submit\" class=\"btn btn-primary\" value=\"Détails produit\">
                                        </form>
                                        <form method=\"GET\" action=\"./panier.php\">
                                            <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
                                            <input type=\"submit\" class=\"btn btn-primary mt-3\" value=\"Ajouter au panier\">
                                        </form>
                                    </div>
                                </div>";
                    }
                ?>
            </div>
        </div>
    </main>

    <?php
        include 'footer.php'
    ?>
</body>