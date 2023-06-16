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
    <main class="d-flex align-items-center" id="profil_modif_infos">
        <div class="container">
            <div class="row justify-content-center grid gap-5 flex-nowrap p-5">
                <div class="col-md-6 text-white rounded border border-secondary" id="col_profil_modif_infos">
                    <h2 class="mt-3 mb-3 text-center">modification informations personnelles</h2>

                    <!-- formulaire -->
                    <form method="post" action="./profil.php">

                        <!-- nom -->
                        <div class="form-group col-sm-10 mx-auto">
                            <label for="nom"><small>Nom</small></label>
                            <input type="text" class="form-control mb-3" name="nom" id="nom" value="<?= $_SESSION["user"]["nom"] ?>" placeholder="Entrez votre nouveau nom">
                        </div>

                        <!-- prenom -->
                        <div class="form-group col-sm-10 mx-auto">
                            <label for="prenom"><small>Prénom</small></label>
                            <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $_SESSION["user"]["prenom"] ?>" placeholder="Entrez votre nouveau prenom">
                        </div>

                        <!-- boutton + lien -->
                        <div class="d-flex justify-content-center">
                            <!-- boutton modification -->
                            <button type="submit" class="btn btn-light mt-5 mb-4" name="connexion">Modifier mes informations</button>
                            <!-- lien retour profil -->
                            <a href="./profil.php" class="pt-5 mt-3 ms-3 text-white">Revenir au profil</a>
                        </div>

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
