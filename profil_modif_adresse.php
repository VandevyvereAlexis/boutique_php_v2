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
            <div class="row justify-content-center grid gap-5 flex-nowrap rounded border border-secondary p-5" id="row_profil_modif_adresse">

                <!-- Formulaire connexion -->
                <div class="col-md-6 bg-transparent text-white rounded border border-secondary" id="col_profil_modif_adresse">
                    <h2 class="mt-3 mb-3 text-center">Modifiication adresse</h2>

                    <form method="post" action="profil.php">

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrez votre adresse">
                        </div>

                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" placeholder="Entrez votre ville">
                        </div>

                        <div class="form-group">
                            <label for="code_postal">Code Postal</label>
                            <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Entrez votre code postal">
                        </div>

                        <div class="d-flex">
                            <!-- s'inscrire -->
                            <button type="submit" class="btn btn-primary">Modifier l'adresse</button>
                            <!-- lien page connexion -->
                            <a href="./profil_creation_adresse.php" class="pt-5 mt-3 ms-3 text-white">Créer votre adresse</a>
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