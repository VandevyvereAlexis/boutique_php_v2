<!-- header 
======================= -->
<header>

    <!-- navbar 
    ======================= -->
    <nav class="navbar navbar-expand-lg fixed-top border-bottom rounded bg-dark" data-bs-theme="dark">
        <div class="container-fluid mx-auto">

            <!-- Titre navbar-->
            <a class="navbar-brand text-light" href="./index.php">The boutique watch</a>

            <!-- Menu burger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Liens -->
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <!-- Lien 1 -->
                    <a class="nav-link text-light" href="./index.php">Accueil</a>
                    <!-- Lien 2 -->
                    <a class="nav-link text-light" href="./gammes.php">Gammes</a>
                    <!-- Lien 3 -->
                    <a class="nav-link text-light" href="./panier.php">Panier</a>
                    <!-- Lien 4 -->
                    <a class="nav-link text-light" href="./connexion.php" id="co-1">Connexion / Inscription</a>

                </div>
            </div>

            <!-- Logo panier -->
            <div class="d-flex align-items-center border ps-5 rounded" id="logo-panier">
                <a class="nav-link text-light pe-5" href="./connexion.php" id="co-2">Connexion / Inscription</a>
                <a href="./panier.php" class="me-5">
                    <i class="fa-solid fa-basket-shopping position relative p-2" style="color: #ffffff;" id="logo_panier"><span class="ps-2 fs-6"><?= count($_SESSION['panier']) ?></span></i>
                </a>
            </div>

        </div>
    </nav>

</header>