<?php
    // on demarre la sessions PHP
    session_start();
    // on inclut le head
    include "./head.php";
    // on inclut le fichier fonction
    include "./functions.php";
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
    <main class="bg-dark d-flex align-items-center mt-5" id="main-profil">
        <div class="container-fluid">
            <div class="row">
                <h1 class="text-light border border-secondary text-center rounded m-0 mt-1 p-3 mb-5">Profil de <?=$_SESSION["user"]["prenom"] . " " . $_SESSION["user"]["nom"] ?> </h1>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card bg-transparent text-light border border-secondary d-flex justify-content-center" id="card-profil-1">
                        <a href="./profil_modif_infos.php" class="text-center">
                            <i class="fa-regular fa-user text-light fs-2 mt-3"></i>
                            <p class="text-light mt-4 fs-5">Modifier mes informations</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card bg-transparent text-light border border-secondary d-flex justify-content-center" id="card-profil-2">
                        <a href="./profil_modif_password.php" class="text-center">
                            <i class="fa-solid fa-key text-light fs-2 mt-3"></i>
                            <p class="text-light mt-4 fs-5">Modifier mon mot de passe</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card bg-transparent text-light border border-secondary d-flex justify-content-center" id="card-profil-3">
                        <a href="./profil_modif_adresse.php" class="text-center">
                            <i class="fa-solid fa-house text-light fs-2 mt-3"></i>
                            <p class="text-light mt-4 fs-5">Modifier mon adresse</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card bg-transparent text-light border border-secondary d-flex justify-content-center" id="card-profil-4">
                        <a href="./profil_commandes.php" class="text-center">
                            <i class="fa-solid fa-clipboard-list text-light fs-2 mt-3"></i>
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
