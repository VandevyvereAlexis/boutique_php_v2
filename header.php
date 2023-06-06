<!-- header 
======================= -->
<header>

    <!-- navbar 
    ======================= -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark">
        <div class="container-fluid">

            <!-- Titre navbar-->
            <a class="navbar-brand text-center" href="./index.php">The boutique watch</a>

            <!-- Menu burger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Liens -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav me-5 pe-2">

                    <!-- Lien 1 -->
                    <a class="nav-link pe-5 me-5" href="./index.php">Accueil</a>
                    <!-- Lien 2 -->
                    <a class="nav-link me-5 pe-5" href="./panier.php">Panier</a>

                </div>
            </div>

            <!-- Logo panier -->
            <a href="./panier.php" class="me-5">
                <i class="fa-solid fa-basket-shopping position relative" style="color: #ffffff;"><span class="ps-3"><?= count($_SESSION['panier']) ?></span></i>
            </a>

        </div>
    </nav>

</header>
