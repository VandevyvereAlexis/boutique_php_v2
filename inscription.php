<!-- inclusion 
======================= -->
<?php
    session_start();                    // on demarre la sessions PHP "initialisation de la session, accès à la superglobal $_SESSION (tableau associatif)".

    if(isset($_SESSION["user"])) {      // permet d'éviter de retourner au formulaire d'inscription quand l'utilisateur est deja connecter à la place on renvoie sur profil.php
        header("Location: profil.php");
    exit;
    }

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
    <main class="d-flex align-items-center" id="inscription">
        <div class="container">
            <div class="row justify-content-center rounded border border-secondary p-4" id="row_inscription">
                <div class="col-md-6 text-white rounded border border-secondary" id="col_inscription">

                    <!-- titre -->
                    <h2 class="text-center mt-3 mb-3">Inscription</h2>

                    <!-- formulaire inscription -->
                    <form method="post" action="./connexion.php">

                        <!-- nom + prenom -->
                        <div class="form-group d-flex justify-content-around">

                            <!-- nom -->
                            <div class="col-sm-4">
                                <label for="nom"><small>Nom</small></label>
                                <input type="text" class="form-control mb-3 form-control-sm" name="nom" id="nom" placeholder="Entrez votre nom">
                            </div>

                            <!-- prenom -->
                            <div class="col-sm-4">
                                <label for="prenom"><small>prénom</small></label>
                                <input type="text" class="form-control mb-3 form-control-sm" name="prenom" id="prenom" placeholder="Entrez votre prenom">
                            </div>

                        </div>

                        <!-- email -->
                        <div class="form-group col-sm-10 mx-auto">
                            <label for="email"><small>Email</small></label>
                            <input type="email" class="form-control mb-3 form-control form-control-sm" name="email" id="email" placeholder="Entrez votre email">
                        </div>

                        <!-- mot de passe -->
                        <div class="form-group col-sm-10 mx-auto">
                            <label for="password"><small>Mot de passe</small></label>
                            <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Entrez votre mot de passe">
                            <p><small class="text-light">8 et 15 caracteres. minimum 1 lettre, 1 chiffre et 1 caractère spécial</small></p>
                        </div>

                        <div class="form-group d-flex justify-content-around">

                            <!-- code postal -->
                            <div class="col-sm-4">
                                <label for="code_postal"><small>Code postal</small></label>
                                <input type="text" class="form-control mb-3 form-control-sm" name="code_postal" id="code_postal" placeholder="Entrez votre code postal">
                            </div>

                            <!-- ville -->
                            <div class="col-sm-4">
                                <label for="ville"><small>Ville</small></label>
                                <input type="text" class="form-control mb-3 form-control-sm" name="ville" id="ville" placeholder="Entrez votre ville">
                            </div>

                        </div>

                        <!-- code postal -->
                        <div class="form-group col-sm-10 mx-auto">
                            <label for="adresse"><small>Adresse</small></label>
                            <input type="text" class="form-control mb-3 form-control form-control-sm" name="adresse" id="adresse" placeholder="Entrez votre email">
                        </div>

                        <!-- button + lien -->
                        <div class="d-flex justify-content-center">
                            <!-- s'inscrire -->
                            <button type="submit" class="btn btn-light mt-5 mb-4">S'inscrire</button>
                            <!-- lien page connexion -->
                            <a href="./connexion.php" class="pt-5 mt-3 ms-3 text-white">Connexion</a>
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