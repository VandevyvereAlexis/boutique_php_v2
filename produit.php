<?php
// J'inclus le fichier des functions pour pouvoir les appeler ici
include 'functions.php';
session_start();
// J'inclus le head avec les balises de base + la balise head ( pour ne pas répéter le code qu'il contient )
include 'head.php';
 //initialiser panier 
createCart();
?>

<body>
    <?php
    include 'header.php';
    ?>

    <main>
        <?php
        // 1. Récupérer l'id transmis par le formulaire en GET 
        $productId = $_GET['productId'];
        //var_dump($productId); // Je teste ma variable
        // 2. Récupérer le produit qui correspond a cet id
        $article = getArticleFromId($productId);
        //var_dump($article); // Je teste ma variable
        // 3. Afficher ses infos
        
        ?>

        <div class="container" id="produit_card">
            <div class="card mb-3 text-center bg-dark">
                <img src="./images/<?= $article['picture']?>" class="card-img-top mx-auto" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-light"><?= $article['name']?></h5>
                    <p class="card-text text-light"><?= $article['price']?>€</p>
                    <p class="card-text text-light"><?= $article['description']?></p>
                    <p class="card-text text-light"><small class="text-light"><?= $article['detailleDescription']?></small></p>
                </div>
            </div>
        </div>
    </main>

    <?php
    include 'footer.php'
    ?>
</body>