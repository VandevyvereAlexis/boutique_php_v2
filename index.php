<?php
    // J'inclus le fichier des functions pour pouvoir les appeler ici
    include 'functions.php';
    session_start();
    // J'inclus le head avec les balises de base + la balise head ( pour ne pas répéter le code qu'il contient)
    include 'head.php';
?>

<body>
    <?php
        include 'header.php';
    ?> 

    <main>
        <div class="container">
            <div class="row" id="card">
                <?php
                    // Je déclare la variable qui contient mon tableau d'articles
                    // Sa valeur, c'est le tableau d'articles renvoyé par la fonction getArticle()
                    $articles = getArticles();

                    // Je teste cette variable pour vérifier que j'ai bien mes 3 articles
                    // var_dump($articles);

                    // Je lance ma boucle pour afficher une carte boostrap par article 
                    foreach($articles as $article) {
                        echo    '<div class="card col-md-4 mt-2">
                                    <img src="./images/' . $article['picture'] . '" class="card-img-top mt-2" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $article['name'] . '</h5>
                                        <p class="card-text">' . $article['description'] . '</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>';
                    }
                ?>
            </div>
        </div>
    </main>

    <?php
        include 'footer.php'
    ?>
</body>
<img src="" alt="">