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
    <main class="bg-dark" style="height: 100vh">
        <section id="validation-panier">
            <div class="container">


                <!-- PHP -->
                <?php

                foreach ($_SESSION['panier'] as $articlePanier) {
                    echo '<div class="container mb-3 mt-5 p-3 mx-auto border border-secondary" id="container-panier">
                            <div class="row align-items-center">

                                <div class="col-md-2 text-center">
                                    <img src="./images/' . $articlePanier['picture'] . '" alt="..." style="width: 100px">
                                </div>

                                <div class="col-md-2 text-center">
                                    <h4 class="fs-6 m-0 text-light">' . $articlePanier['name'] . '</h4>
                                </div>

                                <div class="col-md-2 text-center">
                                    <h4 class="fs-6 m-0 text-light">' . $articlePanier['price'] . '€</h4>
                                </div>

                                <div class="col-md-2 text-center">
                                    <h4 class="fs-6 m-0 text-light">' . $articlePanier['quantite'] . '</h4>
                                </div>

                            </div>
                        </div>';
                }
                ?>

            </div>
        </section>



        <!-- section total panier validation 
        ======================= -->
        <section id="total-panier-validation">
            <div class="container">
                <div class="row text-center">
                    <!-- Total panier -->
                    <h4 class="text-light fs-6 mt-4">Total du panier : <?= totalPanier() ?>€</h4>
                    <!-- Frais de port -->
                    <?php echo '<h4 class="fs-6 m-0 text-light mt-2">Frais de port : ' . frais($_SESSION['panier']) . '€</h4>'; ?>
                    <!-- Total panier + frais de port -->
                    <h4 class="text-light fs-6 mt-4">Total du panier : <?= totalPanier() + frais($_SESSION['panier']) ?>€</h4>

                    <!-- Boutton modal -->
                    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Confirmer l'achat
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Félicitation !</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="text-success">Votre commande a été validée.</h4>
                                    <h4 class="fs-6 mt-4">Montant total : <?= totalPanier() + frais($_SESSION['panier']) ?>€</h4>
                                    <h4 class="fs-6 mt-4">Merci de votre confiance</h4>
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