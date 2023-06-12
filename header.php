<!-- header 
======================= -->
<header>





    <!-- navbar 
    ======================= -->
    <nav class="navbar navbar-expand-lg fixed-top border-bottom rounded bg-dark" data-bs-theme="dark">
        <div class="container-fluid mx-auto">


            <!-- titre navbar-->
            <a class="navbar-brand text-light" href="./index.php">The boutique watch</a>


            <!-- menu burger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- liens -->
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <!-- lien Accueil -->
                    <a class="nav-link text-light" href="./index.php">Accueil</a>
                    <!-- lien Gammes -->
                    <a class="nav-link text-light" href="./gammes.php">Gammes</a>
                    <!-- lien Panier -->
                    <a class="nav-link text-light" href="./panier.php">Panier</a>

                    <!-- si utilisateur non connecter / inscrit, affichage de "connexion/inscription"  -->
                    <?php if(!isset($_SESSION["user"])):?>
                        <!-- lien connexion / inscritpion -->
                        <a class="nav-link text-light" href="./connexion.php" id="conexion-nav">Connexion / Inscription</a>
                    <!-- si utilisateur connecter / inscrit, affichage de "profil et deconnexion"  -->
                    <?php else: ?>
                        <!-- lien Profil -->
                        <a class="nav-link text-light" href="./profil.php" id="profil-nav">Profil</a>
                        <!-- lien déconnexion -->
                        <a class="nav-link text-light" href="./deconnexion.php" id="deconnexion-nav">Deconnexion</a>
                    <!-- finsi --> 
                    <?php endif; ?>

                </div>
            </div>


            <!-- section droite navbar -->
            <div class="border rounded" id="section_logo_panier">
                <!-- liens logo redirige vers panier -->
                <a href="./panier.php" class="me-2">
                    <!-- logo panier -->
                    <i class="fa-solid fa-basket-shopping position relative p-2 text-light" id="logo_panier"><span class="ps-2 fs-6"><?= count($_SESSION['panier']) ?></span></i>
                </a>
            </div>


        </div>
    </nav>





</header>