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
    <main class="bg-dark d-flex align-items-center" id="profil_modif_adresse">
        <div class="container">
            <div class="row justify-content-center grid gap-5 flex-nowrap p-5">

                <!-- Formulaire connexion -->
                <div class="col-md-6 text-white rounded border border-secondary" id="col_profil_modif_adresse">
                    <h2 class="mt-3 mb-3 text-center">Modification adresse</h2>

                    <form method="post" action="profil.php">

                        <div class="form-group col-sm-10 mx-auto">
                            <label for="adresse"><small>Adresse</small></label>
                            <input type="text" class="form-control mb-3" id="adresse" name="adresse" placeholder="Entrez votre adresse">
                        </div>

                        <div class="form-group d-flex justify-content-around">

                            <div class="form-group col-sm-4">
                                <label for="ville"><small>Ville</small></label>
                                <input type="text" class="form-control mb-3" id="ville" name="ville" placeholder="Entrez votre ville">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="code_postal"><small>Code Postal</small></label>
                                <input type="text" class="form-control mb-3" id="code_postal" name="code_postal" placeholder="Entrez votre code postal">
                            </div>

                        </div>

                        <div class="d-flex justify-content-center">
                            <!-- s'inscrire -->
                            <button type="submit" class="btn btn-light mt-5 mb-4">Modifier l'adresse</button>
                            <!-- lien page connexion -->
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