<!-- inclusion 
======================= -->
<?php
include 'functions.php';    // inclusion fichier des fonctions --> appeler les fonctions concernées sur ce fichier.
include 'head.php';         // inclusion du head.
session_start();            // initialiser la session et accéder à la superglobal $_SESSION 'tableau associatif'.
createCart();               // initialiser le panier.
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
    <main class="bg-dark pt-5" id="validation-panier">
            <!-- titre -->
            <h1 class="text-light pt-3 text-center">Votre commande</h1>


                <!-- PHP -->
                <?php

                foreach ($_SESSION['panier'] as $articlePanier) {
                    echo'<div class="container mb-3 mt-5 p-2 mx-auto border border-secondary rounded" id="container-panier">
                        <div class="row align-items-center">

                            <div class="col-md-2 text-center border-end">
                                <img src="./images/' . $articlePanier['image'] . '" alt="montre">
                            </div>

                            <div class="col-md-2 text-center">
                                <h4 class="fs-6 m-0 text-light">' . $articlePanier['nom'] . '</h4>
                            </div>

                            <div class="col-md-2 text-center">
                                <h4 class="fs-6 m-0 text-light">' . $articlePanier['description'] . '</h4>
                            </div>

                            <div class="col-md-2 text-center">
                                <h4 class="fs-6 m-0 text-light">' . $articlePanier['prix'] . '€</h4>
                            </div>

                            <div class="col-md-2 text-center">
                                    <h4 class="fs-6 m-0 text-light">' . $articlePanier['quantite'] . '</h4>
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

            </div>
        </section>



        <!-- section total panier validation 
        ======================= -->
        <section id="total-panier-validation">
            <div class="container pt-4">
                <div class="row text-center rounded" id="row_total-panier-validation">
                    <!-- Total panier -->
                    <h4 class="text-light fs-5 mt-4" id="">Total du panier : <?= totalPanier() ?>€</h4>
                    <!-- Frais de port -->
                    <?php echo '<h4 class="fs-5 m-0 text-light mt-2">Frais de port : ' . frais($_SESSION['panier']) . '€</h4>'; ?>
                    <!-- Total panier + frais de port -->
                    <h4 class="text-light fs-5 mt-4">Total du panier : <?= totalPanier() + frais($_SESSION['panier']) ?>€</h4>

                    <!-- Boutton modal -->
                    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Confirmer l'achat
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-dark text-light" data-bs-theme="dark">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Félicitation !</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="text-success">Votre commande a été validée.</h4>
                                    <h4 class="fs-6 mb-4">Montant total : <?= totalPanier() + frais($_SESSION['panier']) ?>€</h4>
                                    <p class="m-0">Expédition à partir du 
                                        
                                        <?php
                                            // obteniir et afficher la date du jour formatée
                                            $date = date("d-m-Y");
                                            echo $date;
                                        ?>
                                    </p>
                                    <p>Livraison estimée le :
                                        <?php
                                            // calcul : date du jour + 3 jours
                                            // je récupère la date du jour en format Datetime (exigé sur la fonction date_add )
                                            $date = new DateTime("now"); 
                                            // on utilise date_add pour ajouter 3 jours
                                            // date_interval... => permet d'obtenir l'intervalle de temps souhaité pour l'ajouter
                                            date_add($date, date_interval_create_from_date_string("3 days"));
                                            // à ce stade, $date est directement modifiée
                                            // je l'affiche en la formatant : jour mois année => 09-06-2023
                                            echo date_format($date, "d-m-Y");
                                        ?>
                                    </p>
                                    <h4 class="fs-6 mt-4">Merci de votre confiance.</h4>
                                </div>
                                <div class="modal-footer">
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