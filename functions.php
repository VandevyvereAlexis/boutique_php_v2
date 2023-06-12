<?php


    function getConnexion()                                                                                                                // connexion à la base de donnée
    {

        try                                                                                                                                 // try : je tente une connexion
        {                                                                                                                               
            $db = new PDO ('mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8',                                                    //infos:sgbd,nombase,adresse(host)+ 
                'vdv_a',                                                                                                                    // pseudo utilisateur (root en local)
                'As-VDV_11/03',                                                                                                             // mot de passe (aucun en local)
                array (PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_ASSOC)                       // options PDO : 1) affichage des erreurs / 2) récupération des données simplifiée
            );
        }   

        catch (Exception $erreur)                                                                                                           // si ça ne marche pas : je mets fin au code php en affichant l'erreur // je récupère l'erreur en paramètre
        {                                                                                                                       
            die('Erreur : ' . $erreur->getMessage());                                                                                       // je l'affiche et je mets fin au script
        }

        return $db;                                                                                                                         // je retourne la connexion stockée dans une variable
    }


    ////////////////////////////////////////// formulaire d'inscription //////////////////////////////////////////////
    function getInscription()
    {
        $db = getConnexion();
        // On vérifie si le formulaire a été envoyé
        if (!empty($_POST)) {
            // var_dump($_POST);
            // Le formulaire a été envoyer 
            // on vérifie que tous les champs requis sont remplis
            if (isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
                // Le formulaire est complet
                // On récupère les données en les protégeant
                $nom = strip_tags($_POST["nom"]);
                $prenom = strip_tags($_POST["prenom"]);
                $email = strip_tags($_POST["email"]);

                    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        die("L'adresse email est incorrecte");
                    }

                    // on va hasher le mot de passe
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    // die($password);

                    // ajouter ici tous les contrôles souhaités


                    $sql = "INSERT INTO `clients`(`nom`, `prenom`, `email`, `password`) VALUES (:nom, :prenom, :email, '$password')";

                    $query = $db->prepare($sql);

                    // on récupère l'id du nouvel utilisateur
                    $id = $db->lastInsertId();

                    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
                    $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                    $query->bindValue(":email", $email, PDO::PARAM_STR);
                    $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

                    $query->execute();

                    // on demarre la session php

            } else {
                die("le formulaire est incomplet");
            }
        }
    }


    ////////////////////////////////////////// formulaire de connexion //////////////////////////////////////////////
    function getFormConnex()
    {
        $db = getConnexion();
        // On vérifie si le formulaire a été envoyé
        if (!empty($_POST)) {
            // Le formulaire a été envoyé
            // On vérifie que tous les champs requis sont remplis
            if(isset($_POST["email"], $_POST["password"])
                && !empty($_POST["email"] && !empty($_POST["password"]))
            ){
                // On vérifie que l'email en est un
                if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    die("Ce n'est pas un email");
                }

                $sql = "SELECT * FROM `clients` WHERE `email` = :email";
                $query = $db->prepare($sql);

                $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

                $query->execute();

                $user = $query->fetch();

                if(!$user){
                    die("L'utilisateur et/ou le mot de passe est incorrect");
                }

                // ici on a un user existant, on peut vérifier le mot de passe 
                if(!password_verify($_POST["password"], $user["password"])){
                    die("L'utilisateur et/ou le mot de passe est incorrect");
                }

                // ici l'utilisateur et le mot de passe sont corrects
                // on va pouvoir connecter l'utilisateur
                // on demarre la session php
                // session_start();     // deja fait sur les pages
                
                // on stocke dans $_SESSION les informations de l'utilisateur
                $_SESSION["user"] = [
                    "id"        => $user["id"],
                    "nom"       => $user["nom"],
                    "prenom"    => $user["prenom"],
                    "email"     => $user["email"]
                ];

                // var_dump($_SESSION);

                // on redirige vers la page index.php
                header("Location: index.php");
            }
        }
    }




    // récupérer la liste des articles
    function getArticles() 
    {
        // je me connecte à la base de données
        $db = getConnexion();

        // j'exécute une requête qui va récupérer tous les articles
        $results = $db->query('SELECT * FROM articles');

        // je récupère les résultats et je les renvoie grâce à return
        return $results->fetchAll();
    }


    ////////////////////////////////////////////////////////////// Fonction gammes ///////////////////////////////////////////////////////////////
    // récupérer la liste des articles
    function getGamme() 
    {
         // je me connecte à la base de données
        $db = getConnexion();

         // j'exécute une requête qui va récupérer tous les articles
         $results = $db->query('SELECT * FROM gammes');

         // je récupère les résultats et je les renvoie grâce à return
        return $results->fetchAll();
    }



    ////////////////////////////////////////////////////////////// Recuperation de l'article par son id ///////////////////////////////////////////////////////////////
    function getArticlesBygamme($id) 
    {
         // je me connecte à la base de données
        $db = getConnexion();

        // requête pour récupérer un article par son id_gamme
        $query = $db->prepare('SELECT * FROM articles WHERE id_gamme = ?');

        // exution avec le bon paramèter 
        $query->execute ([$id]);

         // je récupère l'article sous forme de tableau associatif
        return $query->fetchAll();
    }



    // Récupérer le produit qui correspond à l'Id fourni en paramètre
    function getArticleFromId($id) {
        $db = getConnexion(); // je me connecte ) la bdd
        // JAMAIS DE VARIABLE PHP DIRECTEMENT DANS UNE REQUETE (risque d'injection SQL )
        $query = $db->prepare('SELECT * FROM Articles WHERE id = ?'); // je prepare ma requête
        $query->execute([$id]); // je l'exécute avec le bon paramètre
        return $query->fetch(); // je retourne l'article sous forme de tableau associatif
    }





    // initaliser le panier 
    function createCart() {
       if (isset($_SESSION['panier']) == false) {   // si mon panier n'existe pas encore 
        $_SESSION['panier'] = [];                   // je l'initialise
        }
    }





    function addToCart($article) {
        // on attribut une quandtité de 1 ( par defaut ) à l'articel 
        $article['quantite'] = 1;
        // je verifie si l'article n'est pas déja présent
        // $i = index de la boucle
        // $i < count($_SESSION['panier]) = condition de maintien de la boucle ( évaluée AVANT chaque tour )
        // (si condition vraie => on lance la boucle)
        // $i++ = évolution d el'index $i à la FIN de chaque boucle
        for ($i = 0; $i < count($_SESSION['panier']); $i++) {
            // si present = quantite +1
            if ($_SESSION['panier'][$i]['id'] == $article['id']) {
                $_SESSION['panier'][$i]['quantite']++;
                return; // permet de sortir de la fonction
            }
        }
        // si pas present => ajout classqiue via array_push
        array_push($_SESSION['panier'], $article);
    }





    function totalPanier() {
        $totalPanier = 0; 
        foreach ($_SESSION['panier'] as $article) {
            // Quantiter x prix 
            $totalPanier += $article['quantite'] * $article['prix'];
        }
        return $totalPanier;
    }





    // modifier la quantite de l'article dans le panier
    function updateQuantity() {
        // je boucle sur le panier => je cherche l'article à modifier 
        for ($i = 0; $i < count($_SESSION['panier']); $i++) {
            // des que je trouyve mon article 
            if ($_SESSION['panier'][$i]['id'] == $_POST['modifiedArticleId']) {
                // je remplace son ancienne quantite par la nouvelle 
                $_SESSION['panier'][$i]['quantite'] = $_POST['newQuantity'];
                // j'affiche un message de succès dans une petite fenêtre via JavaScript 
                echo "<script> alert(\"Quantité modifiée !\");</script>";
                // Je sort de la fonction pour eviter de boucler sur les articles suivants
                return;
            }
        }
    }





    function deletedArticle($id) {
        for ($i = 0; $i < count($_SESSION['panier']); $i++)
        if ($_SESSION['panier'][$i]['id'] == $id) {
            array_splice($_SESSION['panier'], $i, 1);
        }
    }






    function viderPanier() {
        $_SESSION['panier'] = array();
    }






    //function calculerFraisPort()
    function frais() {
        $totalFrais = 0; 
        $fraisParArticle = 3;
        foreach ($_SESSION['panier'] as $article) {
            // Quantiter x prix 
            $totalFrais += $article['quantite'] * $fraisParArticle;
        }
        return $totalFrais;
    }
?>