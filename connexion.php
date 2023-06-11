<!-- inclusion 
======================= -->
<?php
include 'functions.php';    // inclusion fichier des fonctions --> appeler les fonctions concernées sur ce fichier. 
include 'head.php';         // inclusion du head.
session_start();            // initialiser la session et accéder à la superglobal $_SESSION 'tableau associatif'.
createCart();               // initialiser le panier.
// var_dump($_SESSION);
if (isset($_POST['vider_panier'])) {
    viderPanier();
}
getFormConnex();
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
    <main class="bg-dark d-flex align-items-center" id="connexion">
        <div class="container">
            <div class="row justify-content-center grid gap-5 flex-nowrap rounded border border-secondary p-5" id="row_connexion">

                <!-- Formulaire connexion -->
                <div class="col-md-6 bg-transparent text-white rounded border border-secondary" id="col_connexion">
                    <div class="container container-full-height">
                        <h2 class="mt-3 mb-3 text-center">Connexion</h2>

                        <form method="post" action="./index.php">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Entrez votre email">
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Entrez votre mot de passe">
                            </div>
                            <button type="submit" class="btn btn-light mt-5 mb-4">Se connecter</button>
                            <a href="./inscription.php">S'inscrire</a>
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
