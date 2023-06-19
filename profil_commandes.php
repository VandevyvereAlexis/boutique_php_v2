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
    <main class="pt-5" id="profil_commandes">
        <h1 class="pt-5 text-center text-light">Vos commandes</h1>


        <?php
            $commandes = recupCommande();  // Récupère les commandes du client actuellement connecté

            foreach ($commandes as $commande) {
                echo'<div class="container mx-auto border border-secondary rounded mb-3 mt-5 p-4" id="container_profil_commandes">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-light text-center align-items-center">Numéro de commande</th>
                                    <th scope="col" class="text-light text-center">Date</th>
                                    <th scope="col" class="text-light text-center">Total</th>
                                    <th scope="col" class="text-light text-center">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-light text-center">' . $commande['numero'] . '</td>
                                    <td class="text-light text-center">' . $commande['date_commande'] . '</td>
                                    <td class="text-light text-center">' . $commande['prix'] . '</td>
                                    <td class="text-center"> 
                                        <form method="POST" action="./details_commande.php">
                                            <input type="hidden" name="idCommande" value="' . $commande['id'] . '">
                                            <input type="hidden" name="numero" value="' . $commande['numero'] . '">
                                            <input type="hidden" name="date_commande" value="' . $commande['date_commande'] . '">
                                            <input type="hidden" name="prix" value="' . $commande['prix'] . '">
                                            <input type="submit" class="btn btn-outline-light border-info-subtle" value="Détails" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>';
            }
        ?>

        <div class="container">
            <div class="row">
                <div class="col text-center mb-3">
                    <form method="GET" action="./profil.php">
                        <input type="hidden" name="productId" value="' . $commande['id'] . '">
                        <input type="submit" class="btn btn-outline-light border-info-subtle border-3 mt-5" value="Retour au profil">
                    </form>
                </div>
            </div>
        </div>

    </main>





    <!-- footer 
    ======================= -->
    <?php
    include 'footer.php' // inclusion fichier footer.php
    ?>

</body>
