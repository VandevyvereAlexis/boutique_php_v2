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

                        <!-- nom -->
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control mb-3" name="nom" id="nom" placeholder="Entrez votre nom">
                        </div>

                        <!-- prenom -->
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control mb-3" name="prenom" id="prenom" placeholder="Entrez votre prenom">
                        </div>

                        <!-- email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Entrez votre email">
                        </div>

                        <!-- mot de passe -->
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Entrez votre mot de passe">
                            <p><small class="text-light ps-3">8 et 15 caracteres. minimum 1 lettre, 1 chiffre et 1 caractère spécial</small></p>
                        </div>

                        <!-- button + lien -->
                        <div class="d-flex">
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