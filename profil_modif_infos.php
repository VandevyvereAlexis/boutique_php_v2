<?php
    // on demarre la sessions PHP
    session_start();
    include 'functions.php';    // inclusion fichier des fonctions --> appeler les fonctions concernées sur ce fichier. 
    include 'head.php';         // inclusion du head.
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
                        <h2 class="mt-3 mb-3 text-center">Connexion</h2>

                        <form method="post" action="./index.php">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control mb-3" name="nom" id="nom" placeholder="Entrez votre nouveau nom">
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrez votre nouveau prenom">
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-light mt-5 mb-4" name="connexion">Modifier mes informations</button>
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
