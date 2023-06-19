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
    <main class="bg-dark d-flex align-items-center" id="profil_modif_password">
        <div class="container">
            <div class="row justify-content-center grid gap-5 flex-nowrap p-5">

                <!-- Formulaire connexion -->
                <div class="col-md-6 text-white rounded border border-secondary" id="col_profil_modif_password">
                    <h2 class="mt-3 mb-3 text-center">Modification mot de passe</h2>

                    <form method="post" action="./profil.php">

                        <div class="form-group col-sm-10 mx-auto">
                            <label for="old_password"><small>Mot de passe actuel</small></label>
                            <input type="password" class="form-control mb-4" name="old_password" id="old_password" placeholder="Entrez votre mot de passe actuel">
                        </div>

                        <div class="form-group col-sm-10 mx-auto">
                            <label for="new_password"><small>Nouveau mot de passe</small></label>
                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Entrez votre nouveau mot de passe">   <!-- pas de value car c'est un mot de passe -->
                            <p><small class="text-light">8 et 15 caracteres. minimum 1 lettre, 1 chiffre et 1 caractère spécial</small></p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-light mt-5 mb-4" name="connexion">Modifier mon mot de passe</button>
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
