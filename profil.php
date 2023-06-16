<?php
    session_start();                            // on demarre la sessions PHP "initialisation de la session, accès à la superglobal $_SESSION (tableau associatif)".

    include 'functions.php';                    // inclusion fichier des fonctions --> appeler les fonctions concernées sur ce fichier.
    include 'head.php';                         // inclusion du head.

    if (isset($_POST["nom"])) {                 // function modification informations
        modifInfos();
    }

    if (isset($_POST["new_password"])) {        // function modification password
        modifPassword();
    }

    if (isset($_POST["adresse"])) {
        modifierAdresse();
    }
?>





<!-- body 
======================= -->
<body>





    <!-- header 
    ======================= -->
    <?php
    include 'header.php';           // inclusion fichier header.php
    ?>





    <!-- main 
    ======================= -->
    <main class="bg-dark d-flex align-items-center mt-5" id="main-profil">
        <div class="container">
            <div class="row">

                <h1 class="text-light border border-secondary text-center rounded m-0 mt-1 p-3 mb-5">Profil de <?=$_SESSION["user"]["prenom"] . " " . $_SESSION["user"]["nom"] ?> </h1>

                <!-- card 1 - modification informations -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card bg-transparent text-light border border-secondary d-flex justify-content-center" id="card-profil-1">
                        <!-- lien vers page profil_modif_infos.php -->
                        <a href="./profil_modif_infos.php" class="text-center">
                            <!-- logo -->
                            <i class="fa-regular fa-user text-light fs-2 mt-3"></i>
                            <!-- texte -->
                            <p class="text-light mt-4 fs-5">Modifier mes informations</p>
                        </a>
                    </div>
                </div>

                <!-- card 1 - modification password -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card bg-transparent text-light border border-secondary d-flex justify-content-center" id="card-profil-2">
                        <!-- lien vers page profil_modif_password.php -->
                        <a href="./profil_modif_password.php" class="text-center">
                            <!-- logo -->
                            <i class="fa-solid fa-key text-light fs-2 mt-3"></i>
                            <!-- texte -->
                            <p class="text-light mt-4 fs-5">Modifier mon mot de passe</p>
                        </a>
                    </div>
                </div>

                <!-- card 1 - modification / creation adresse -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card bg-transparent text-light border border-secondary d-flex justify-content-center" id="card-profil-3">
                        <!-- lien vers page profil_modif_adresse.php -->
                        <a href="./profil_modif_adresse.php" class="text-center">
                            <!-- logo -->
                            <i class="fa-solid fa-house text-light fs-2 mt-3"></i>
                            <!-- texte -->
                            <p class="text-light mt-4 fs-5">Modifier mon adresse</p>
                        </a>
                    </div>
                </div>

                <!-- card 1 - voir les commandes -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card bg-transparent text-light border border-secondary d-flex justify-content-center" id="card-profil-4">
                        <!-- lien vers page profil_commandes.php -->
                        <a href="./profil_commandes.php" class="text-center">
                            <!-- logo -->
                            <i class="fa-solid fa-clipboard-list text-light fs-2 mt-3"></i>
                            <!-- texte -->
                            <p class="text-light mt-4 fs-5">Voir mes commandes</p>
                        </a>
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
