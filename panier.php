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
        // si je viens d'un bouton d'ajout : je déclenche l'ajout
        if(isset($_GET['productId'])) {
            // 1. Récupérer l'id transmis par le formulaire en GET 
            $productId = $_GET['productId'];
            //var_dump($productId); // Je teste ma variable
            // 2. Récupérer le produit qui correspond a cet id
            $article = getArticleFromId($productId);
            //var_dump($article); // Je teste ma variable
            // 3. Ajouter l'article au panier et tester le résultat
            addToCart($article);
        }
    ?>

    </main>

    <?php
        include 'footer.php'
    ?>
</body>

