<!-- inclusion 
======================= -->
<?php
    session_start();                    // on demarre la sessions PHP "initialisation de la session, accès à la superglobal $_SESSION (tableau associatif)".

    include 'functions.php';            // inclusion fichier des fonctions --> appeler les fonctions concernées sur ce fichier. 
    include 'head.php';                 // inclusion du head.

    createCart();                       // initialiser le panier.

    if (isset($_POST['connexion'])) {
        getFormConnex();
    }

    if (isset($_POST['nom'])) {
        getInscription();
    }

    if(isset($_SESSION["user"])) {      // permet d'éviter de retourner au formulaire de connexion quand l'utilisateur est deja connecter à la place on renvoie sur profil.php
        header("Location: profil.php");
        exit;
    }
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
    <main class="d-flex align-items-center" id="connexion">
        <div class="container">
            <div class="row justify-content-center p-4">
                <div class="col-md-6 text-white rounded border border-secondary" id="col_connexion">

                    <!-- titre -->
                    <h2 class="text-center mt-3 mb-3">Connexion</h2>

                    <!-- formulaire connexion -->
                    <form method="post" action="./index.php">

                        <!-- email -->
                        <div class="form-group col-sm-10 mx-auto">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Entrez votre email">
                        </div>

                        <!-- mot de passe -->
                        <div class="form-group col-sm-10 mx-auto">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Entrez votre mot de passe">
                        </div>

                        <!-- button + lien -->
                        <div class="d-flex justify-content-center">
                            <!-- se connecter -->
                            <button type="submit" class="btn btn-light mt-5 mb-4" name="connexion">Se connecter</button>
                            <!-- lien page inscription -->
                            <a href="./inscription.php" class="pt-5 mt-3 ms-3 text-white">S'inscrire</a>
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
