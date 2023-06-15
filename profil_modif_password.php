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

    <?php 
        //var_dump($_POST)
    ?>

    <!-- main 
    ======================= -->
    <main class="bg-dark d-flex align-items-center" id="profil_modif_infos">
        <div class="container">
            <div class="row justify-content-center grid gap-5 flex-nowrap rounded border border-secondary p-5" id="row_connexion">

                <!-- Formulaire connexion -->
                <div class="col-md-6 bg-transparent text-white rounded border border-secondary" id="col_connexion">
                    <div class="container container-full-height">
                        <h2 class="mt-3 mb-3 text-center">Modification mot de passe</h2>

                        <form method="post" action="./profil.php">

                            <div class="form-group">
                                <label for="old_password"><small class="ps-3">Mot de passe actuel</small></label>
                                <input type="password" class="form-control mb-4" name="old_password" id="old_password" placeholder="Entrez votre mot de passe actuel">
                            </div>

                            <div class="form-group">
                                <label for="new_password"><small class="ps-3">Nouveau mot de passe</small></label>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Entrez votre nouveau mot de passe">   <!-- pas de value car c'est un mot de passe -->
                                <p><small class="text-light ps-3">8 et 15 caracteres. minimum 1 lettre, 1 chiffre et 1 caractère spécial</small></p>
                            </div>

                            <div class="d-flex">
                                <button type="submit" class="btn btn-light mt-5 mb-4" name="connexion">Modifier mon mot de passe</button>
                                <a href="./profil.php" class="pt-5 mt-3 ms-3 text-white">Revenir au profil</a>
                            </div>

                        </form>

                    </div>
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
