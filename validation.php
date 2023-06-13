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
    include 'header.php';   // inclusion fichier header.php
    ?>





    <!-- main 
    ======================= -->
    <main class="pt-5" id="validation-panier">


        <!-- titre -->
        <h1 class="text-light pt-3 text-center">Votre commande</h1>


                <!-- PHP -->
                <?php
                    foreach ($_SESSION['panier'] as $articlePanier) {
                        echo'<div class="container mx-auto border border-secondary rounded  mb-3 mt-5 p-2">
                                <div class="row align-items-center">

                                    <div class="col-md-2 text-center border-end">
                                        <img src="./images/' . $articlePanier['image'] . '" alt="montre">
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <h4 class="text-light fs-6 m-0">' . $articlePanier['nom'] . '</h4>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <h4 class="text-light fs-6 m-0t">' . $articlePanier['description'] . '</h4>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <h4 class="text-light fs-6 m-0">' . $articlePanier['prix'] . '€</h4>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <h4 class="text-light fs-6 m-0">' . $articlePanier['quantite'] . '</h4>
                                    </div>

                                    <form class="col-md-2 text-center" action="./panier.php" method="post">

                                        <input type="hidden" name="deletedArticleId" value="' . $articlePanier['id'] . '">

                                        <button type="hidden" class="bg-transparent border border-0 mt-lg-8">
                                            <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #ff2600;"></i>
                                        </button>

                                    </form>
                                
                                </div>
                            </div>';
                    }
                ?>



        <!-- section total panier validation 
        ======================= -->
        <section id="total-panier-validation">
            <div class="container pt-4">
                <div class="row text-center rounded">

                    <!-- total panier -->
                    <h4 class="text-light fs-5 mt-4" id="">Total du panier : <?= totalPanier() ?>€</h4>
                    <!-- frais de port -->
                    <?php echo '<h4 class="text-light mt-2 fs-5 m-0">Frais de port : ' . frais($_SESSION['panier']) . '€</h4>'; ?>
                    <!-- total panier + frais de port -->
                    <h4 class="text-light fs-5 mt-4">Total du panier : <?= totalPanier() + frais($_SESSION['panier']) ?>€</h4>

                    <!-- boutton modal -->
                    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Confirmer l'achat
                    </button>

                    <!-- modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-dark text-light" data-bs-theme="dark">
                                <!-- modal-header -->
                                <div class="modal-header">
                                    <!-- titre -->
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Félicitation !</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- modal-body -->
                                <div class="modal-body">

                                    <!-- total panier + message commande validée -->
                                    <h4 class="text-success">Votre commande a été validée.</h4>
                                    <h4 class="fs-6 mb-4">Montant total : <?= totalPanier() + frais($_SESSION['panier']) ?>€</h4>

                                    <!-- expédition -->
                                    <p class="m-0">Expédition à partir du 
                                        <?php
                                            // obteniir et afficher la date du jour formatée
                                            $date = date("d-m-Y");
                                            echo $date;
                                        ?>
                                    </p>

                                    <!-- livraison -->
                                    <p>Livraison estimée le :
                                        <?php
                                            // calcul : date du jour + 3 jours
                                            $date = new DateTime("now");                                        // je récupère la date du jour en format Datetime (exigé sur la fonction date_add )

                                            // on utilise date_add pour ajouter 3 jours
                                            date_add($date, date_interval_create_from_date_string("3 days"));   // date_interval... => permet d'obtenir l'intervalle de temps souhaité pour l'ajouter

                                            // à ce stade, $date est directement modifiée
                                            echo date_format($date, "d-m-Y");                                    // je l'affiche en la formatant : jour mois année => 09-06-2023
                                        ?>
                                    </p>

                                    <!-- merci -->
                                    <h4 class="fs-6 mt-4"> <?= $_SESSION["user"]["prenom"] . " " . $_SESSION["user"]["nom"] ?> merci de votre confiance.</h4>

                                </div>

                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <!-- retour index.php après validation -->
                                    <form action="index.php" method="post">
                                        <button type="submit" name="vider_panier" class="btn btn-primary">Retour à l'accueil</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main>





    <!-- footer 
    ======================= -->
    <?php
    include 'footer.php'    // inclusion fichier footer.php
    ?>

</body>