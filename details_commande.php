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
    include 'header.php';       // inclusion fichier header.php
    ?>





    <!-- main 
    ======================= -->
    <main class="pt-5" id="details_commande">

        <h1 class="text-light text-center m-0 pt-5"><small>Détails de la commande n° </small><?= $_POST['numero'] ?></h1>';
        <h4 class="text-light text-center fs-6 m-0 fs-4"></small>Commande du : </small><?= $_POST['date_commande'] ?> - <small>d'un montant de : </small><?= $_POST['prix'] ?> €</h4>

        <?php
            //var_dump(recupDetailsCommande($_POST['idCommande']))
            $articles = recupDetailsCommande($_POST['idCommande']);
            $quantite = 0;
            $frais = 3;
        ?>


        <?php
            foreach ($articles as $article) {
                echo'<div class="container mx-auto border border-secondary rounded mb-3 mt-5 p-4" id="container_profil_commandes">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-light text-center align-items-center">Description</th>
                                    <th scope="col" class="text-light text-center">Prix unitaire</th>
                                    <th scope="col" class="text-light text-center">Quantité</th>
                                    <th scope="col" class="text-light text-center">Montant total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-light text-center">' . $article['nom'] . $article['description'] . '</td>
                                    <td class="text-light text-center">' . $article['prix'] . ' €</td>
                                    <td class="text-light text-center">' . $article['quantite'] . '</td>
                                    <td class="text-light text-center">' . $article['prix'] * $article['quantite'] . ' €</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>';

                    $quantite += $article['quantite'];

            }
        ?>


        <div class="container mx-auto border border-secondary rounded mb-3 p-4" id="container_profil_commandes">

            <table class="table">
                <thead>

                    <tr>
                        <th scope="col" class="text-light text-center">Frais de port</th>
                        <th scope="col" class="text-light text-center">Quantité</th>
                        <th scope="col" class="text-light text-center">Montant total</th>
                    </tr> 

                </thead>
                <tbody>

                    <tr>
                        <td class="text-light text-center"><?= $frais ?> €</td>
                        <td class="text-light text-center"><?= $article['quantite'] ?></td>
                        <td class="text-light text-center"><?= $quantite * 3 ?> €</td>
                    </tr>

                </tbody>
            </table>

        </div>


        <div class="container">
            <div class="row">
                <div class="col text-center mb-3">

                    <form method="GET" action="./profil_commandes.php">
                        <input type="hidden" name="productId" value="">
                        <input type="submit" class="btn btn-outline-light border-info-subtle border-3 mt-5" value="Mes commandes">
                    </form>

                </div>
            </div>
        </div>


    </main>





    <!-- footer 
    ======================= -->
    <?php
        include 'footer.php'            // inclusion fichier footer.php
    ?>





</body>