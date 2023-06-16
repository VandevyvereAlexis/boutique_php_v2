<!-- SOMMAIRE
------------------------------------------------------------------------------------------------------------------- -->
<!--

    66.         CONNEXION A LA BASE DE DONNEES                                                          "TERMINE"

    97.         FORMULAIRE D'INSCRIPTION (Nom + prenom + mail)                                          "TERMINE"

    175.         FORMULAIRE D'INSCRIPTION (Nom + prenom + email + ville + code postal + adresse)        "TERMINE"

    271.        VERIFICATION QU'AUCUN INPUT NE SOIT VIDE                                                "TERMINE"

    293.        VERIFICATION QUE LE COMPTE NE SOIT PAS DEJA EXISTANT                                    "TERMINE"

    315.        CHECK LONGUEUR DES CARACTERES                                                           "TERMINE"

    381.        REGEX POUR PASSWORD                                                                     "TERMINE"

    400.        FORMUALIRE CONNEXION                                                                    "TERMINE"

    469.        FORMULAIRE MODIFICATION INFORMATION                                                     "TERMINE"

    521.        FORMUALIRE MODIFICATION MOT DE PASSE                                                    "TERMINE"

    581.        RECUPERATION LISTE DES ARTICLES                                                         "TERMINE"

    602.        RECUPERATION LISTE DES GAMMES                                                           "TERMINE"

    623.        RECUPERATION LISTE ARTICLES POUR UNE GAMME                                              "TERMINE"

    646.        RECUPERATION D'ARTICLE PAR ID                                                           "TERMINE"

    671.        INITIALISATION PANIER                                                                   "TERMINE"

    691.        FONCTION QUANTITEE ARTICLE                                                              "TERMINE"

    730.        FONCTION TOTAL PANIER                                                                   "TERMINE"

    751.        MODIFIER QUANTITE DE L'ARTICLE DANS LE PANIER                                           "TERMINE"

    778.        SUPRESSION D'ARTICLE DANS LE PANIER                                                     "TERMINE"

    798.        VIDER PANIER                                                                            "TERMINE"

    813.        CALCULER LES FRAIS DE PORT                                                              "TERMINE"

    836.        FORMULAIRE MODIFICATION ADRESSE                                                         "TERMINE"

    886.        LISTE DES COMMANDES                                                                     "A FAIRE"

-->










<?php

    /* CONNEXION A LA BASE DE DONNEES                                                                               "TERMINE"
    ====================================================================================================================== */
    function getConnexion()                                                                                                                                 // connexion à la base de donnée
    {
        try                                                                                                                                                 // try : je tente une connexion
        {                                                                                                                               
            $db = new PDO ('mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8',                                                                    // infos:sgbd,nombase,adresse(host)+ 
                'vdv_a',                                                                                                                                    // pseudo utilisateur (root en local)
                'As-VDV_11/03',                                                                                                                             // mot de passe (aucun en local)
                array (PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_ASSOC)                                       // options PDO : 1) affichage des erreurs / 2) récupération des données simplifiée
            );
        }   

        catch (Exception $erreur)                                                                                                                           // si ça ne marche pas : je mets fin au code php en affichant l'erreur // je récupère l'erreur en paramètre
        {                                                                                                                       
            die('Erreur : ' . $erreur->getMessage());                                                                                                       // je l'affiche et je mets fin au script
        }

        return $db;                                                                                                                                         // je retourne la connexion stockée dans une variable
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* FORMULAIRE D'INSCRIPTION (Nom + prenom + mail)                                                               "TERMINE"
    ====================================================================================================================== */
    /*function getInscription()
    {
        $db = getConnexion();

        if (!checkEmptyFields())                                                                                                                            // On vérifie si le formulaire a été envoyé
        {                    

            // On récupère les données en les protégeant
            $nom = strip_tags($_POST["nom"]);                                                                                                               // "strip_tags" obligatoire, enleve les balises dans les champs de caractère protege contre faille xss
            $prenom = strip_tags($_POST["prenom"]);
            $email = strip_tags($_POST["email"]);
            $password = strip_tags($_POST["password"]);

            if (checkCaracteres())
            {

                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                {

                    if (!checkEmail($email))
                    {

                        if (checkPassword($_POST["password"]))                                                                                              // je déclare ma fonction checkPassword "regex" et je met le reste du code à l'intérieur avec else die pour afficher un message 
                        {

                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);                                                                // on va hasher le mot de passe

                            $sql = "INSERT INTO `clients`(`nom`, `prenom`, `email`, `password`) VALUES (:nom, :prenom, :email, :password)";

                            $query = $db->prepare($sql);                                                                                                    // on récupère l'id du nouvel utilisateur

                            $query->bindValue(":nom", $nom, PDO::PARAM_STR);
                            $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                            $query->bindValue(":email", $email, PDO::PARAM_STR);
                            $query->bindValue(":password", $password, PDO::PARAM_STR);

                            $query->execute();

                            echo "<script>alert('Votre compte a bien été créé.')</script>";

                        }
                        else {
                            echo "<script>alert('Sécurité du mot de passe insuffisante. Veuillez choisir un mot de passe plus fort.')</script>";
                        }  

                    }
                    else {
                        echo "<script>alert('Ce compte est déjà existant. Veuillez utiliser une adresse email différente.')</script>";
                    }

                } 
                else {
                    echo "<script>alert('L'adresse email est incorrecte. Veuillez entrer une adresse email valide.')</script>";
                }

            } 
            else {
                echo "<script>alert('Longueur des caractères insuffisante. Veuillez entrer des valeurs avec une longueur suffisante.')</script>";
            }

        }
        else { 
            echo "<script>alert('Le formulaire est incomplet. Veuillez remplir tous les champs obligatoires.')</script>";
        }
    }*/
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* FORMULAIRE D'INSCRIPTION (Nom + prenom + email + ville + code postal + adresse)                              "TERMINE"
    ====================================================================================================================== */
    function getInscription()
    {
        $db = getConnexion();

        if (!checkEmptyFields()) 
        {

            // On récupère les données en les protégeant
            $nom = strip_tags($_POST["nom"]);
            $prenom = strip_tags($_POST["prenom"]);
            $email = strip_tags($_POST["email"]);
            $password = strip_tags($_POST["password"]);
            $adresse = strip_tags($_POST["adresse"]);
            $codePostal = strip_tags($_POST["code_postal"]);
            $ville = strip_tags($_POST["ville"]);

            if (checkCaracteres()) 
            {

                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
                {

                    if (!checkEmail($email)) 
                    {

                        if (checkPassword($_POST["password"])) 
                        {

                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                            $sql = "INSERT INTO `clients`(`nom`, `prenom`, `email`, `password`) VALUES (:nom, :prenom, :email, :password)";

                            $query = $db->prepare($sql);
                            $query->bindValue(":nom", $nom, PDO::PARAM_STR);
                            $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                            $query->bindValue(":email", $email, PDO::PARAM_STR);
                            $query->bindValue(":password", $password, PDO::PARAM_STR);

                            if ($query->execute()) 
                            {

                                $id_client = $db->lastInsertId();

                                $sql = "INSERT INTO `adresses`(`adresse`, `code_postal`, `ville`, `id_client`) VALUES (:adresse, :code_postal, :ville, :id_client)";

                                $query = $db->prepare($sql);
                                $query->bindValue(":adresse", $adresse, PDO::PARAM_STR);
                                $query->bindValue(":code_postal", $codePostal, PDO::PARAM_STR);
                                $query->bindValue(":ville", $ville, PDO::PARAM_STR);
                                $query->bindValue(":id_client", $id_client, PDO::PARAM_INT);

                                if ($query->execute()) 
                                {
                                    echo "<script>alert('Votre compte a bien été créé.')</script>";
                                }

                            }

                        } 
                        else {
                            echo "<script>alert('Sécurité du mot de passe insuffisante. Veuillez choisir un mot de passe plus fort.')</script>";
                        }

                    } 
                    else {
                        echo "<script>alert('Ce compte est déjà existant. Veuillez utiliser une adresse email différente.')</script>";
                    }

                } 
                else {
                    echo "<script>alert('L\'adresse email est incorrecte. Veuillez entrer une adresse email valide.')</script>";
                }

            } 
            else {
                echo "<script>alert('Longueur des caractères insuffisante. Veuillez entrer des valeurs avec une longueur suffisante.')</script>";
            }

        } 
        else {
            echo "<script>alert('Le formulaire est incomplet. Veuillez remplir tous les champs obligatoires.')</script>";
        }
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* VERIFICATION QU'AUCUN INPUT NE SOIT VIDE                                                                     "TERMINE"
    ====================================================================================================================== */
    function checkEmptyFields()
    {
        foreach ($_POST as $field) {
            if (empty($field)) {
                return true;
            }
        }
        return false;
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* VERIFICATION QUE LE COMPTE NE SOIT PAS DEJA EXISTANT                                                         "TERMINE"
    ====================================================================================================================== */
    function checkEmail($email)
    {
        $db = getConnexion();

        $query = $db->prepare("SELECT * FROM clients WHERE email = ?");
        $query->execute([$email]);

        return $query->fetch();
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* CHECK LONGUEUR DES CARACTERES                                                                                "TERMINE"
    ====================================================================================================================== */
    function checkCaracteres()
    {
        $inputsLenghtOk = true;


        if (isset($_POST["nom"])) 
        {
            if (strlen($_POST['nom']) > 25 || strlen($_POST['nom']) < 3) 
            {
                $inputsLenghtOk = false;
            }
        }

        if (isset($_POST["prenom"])) 
        {
            if (strlen($_POST['prenom']) > 25 || strlen($_POST['prenom']) < 3) 
            {
                $inputsLenghtOk = false;
            }
        }

        if (isset($_POST["email"])) 
        {
            if (strlen($_POST['email']) > 25 || strlen($_POST['email']) < 5) 
            {
                $inputsLenghtOk = false;
            }
        }

        if (isset($_POST["adresse"])) 
        {
            if (strlen($_POST['adresse']) > 40 || strlen($_POST['adresse']) < 5) {
                $inputsLenghtOk = false;
            }
        }
    
        if (isset($_POST["code_postal"])) 
        {
            if (strlen($_POST['code_postal']) !== 5) {
                $inputsLenghtOk = false;
            }
        }
    
        if (isset($_POST["ville"])) 
        {
            if (strlen($_POST['ville']) > 25 || strlen($_POST['ville']) < 3) {
                $inputsLenghtOk = false;
            }
        }
    

        return $inputsLenghtOk;
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* REGEX POUR PASSWORD                                                                                          "TERMINE"
    ====================================================================================================================== */
    function checkPassword($password)    
    { 
        $regex = "^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@$!%*?/&])(?=\S+$).{8,15}$^";                                                                             // minimum 8 caractères et maximum 15, minimum 1 lettre, 1 chiffre et 1 caractère spécial

        return preg_match($regex, $password);
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* FORMUALIRE CONNEXION                                                                                         "TERMINE"
    ====================================================================================================================== */
    function getFormConnex()
    {
        $db = getConnexion();

        if (checkEmptyFields())                                                                                                                             // On vérifie que tous les champs sont saisies
        {                                                                                                

            if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))                                                                                          // On vérifie que l'email en est un
            {                                                        

                $sql = "SELECT * FROM `clients` WHERE `email` = :email";
                $query = $db->prepare($sql);

                $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

                $query->execute();

                $user = $query->fetch();

                if($user)
                {

                    if(password_verify($_POST["password"], $user["password"]))                                                                              // ici on a un user existant, on peut vérifier le mot de passe
                    {                                                   

                        // ici l'utilisateur et le mot de passe sont corrects, on va pouvoir connecter l'utilisateur.

                        $_SESSION["user"] = [                                                                                                               // on stocke dans $_SESSION les informations de l'utilisateur
                            "id"        => $user["id"],
                            "nom"       => $user["nom"],
                            "prenom"    => $user["prenom"],
                            "email"     => $user["email"]
                        ];

                        header("Location: index.php");                                                                                                      // on redirige vers la page index.php

                    }
                    else {
                        echo "<script>alert('L'adresse et/ou le mot de passe est incorrect. Veuillez vérifier vos informations de connexion.')</script>";
                    }

                }
                else {
                    echo "<script>alert('L'adresse et/ou le mot de passe est incorrect. Veuillez vérifier vos informations de connexion.')</script>";
                }

            }
            else {
                echo "<script>alert('L'adresse email est incorrecte. Veuillez entrer une adresse email valide.')</script>";
            }

        }
        else { 
            echo "<script>alert('Le formulaire est incomplet. Veuillez remplir tous les champs obligatoires.')</script>";
        }
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* FORMULAIRE MODIFICATION INFORMATION                                                                          "TERMINE"
    ====================================================================================================================== */
    function modifInfos()
    {
        $db = getConnexion();

        if (checkEmptyFields())                                                                                                                             // On vérifie si le formulaire a été envoyé
        {

            $nom = strip_tags($_POST["nom"]);
            $prenom = strip_tags($_POST["prenom"]);

            if (checkCaracteres())
            {                                                                                                                                               // Vérifier si la clé 'id' existe dans $_SESSION["user"]                                                                                                              // Stockez l'ID de l'utilisateur dans une variable distincte

                $sql = "UPDATE `clients` SET `nom`=:nom, `prenom`=:prenom WHERE id = :id";

                $query = $db->prepare($sql); 

                $query->bindValue(":nom", $nom, PDO::PARAM_STR);
                $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                $query->bindValue(":id", $_SESSION["user"]["id"], PDO::PARAM_STR);                                                                          // Utilisez la variable $id ici

                $query->execute();

                // Mettre à jour seulement les valeurs de 'nom' et 'prenom' dans la session
                $_SESSION["user"]["nom"] = $nom;
                $_SESSION["user"]["prenom"] = $prenom;

                echo "<script>alert('Votre nom et prénom ont été modifiés avec succès.');</script>";

            }
            else {
                echo "<script>alert('Longueur des caractères insuffisante. Veuillez entrer des valeurs avec une longueur suffisante.')</script>";
            }

        }
        else { 
            echo "<script>alert('Le formulaire est incomplet. Veuillez remplir tous les champs obligatoires.')</script>";
        }
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* FORMUALIRE MODIFICATION MOT DE PASSE                                                                         "TERMINE"
    ====================================================================================================================== */
    function modifPassword()
    {
        $db = getConnexion();

        if (checkEmptyFields())                                                                                                                             // On vérifie si le formulaire a été envoyé
        {

            $client = checkEmail($_SESSION['user']['email']);                                                                                               // Je recupere la fonction (checkemail) qui me permet de récupérer l'id du client en fonction de son email. 

            if (password_verify($_POST["old_password"], $client["password"])) 
            {   

                if (checkPassword($_POST["new_password"]))                                                                                                  // je déclare ma fonction checkPassword "regex" et je met le reste du code à l'intérieur avec else die pour afficher un message 
                {

                    $password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);                                                                    // on va hasher le mot de passe

                    $sql = "UPDATE `clients` SET `password`=:password WHERE id = :id";

                    $query = $db->prepare($sql);

                    $query->bindValue(":password", $password, PDO::PARAM_STR);
                    $query->bindValue(":id", $client["id"], PDO::PARAM_INT);                                                                                // Utiliser l'id du client récupéré depuis la base de données

                    if ($query->execute()) 
                    {
                        echo "<script>alert('Le mot de passe a été modifié avec succès.');</script>";
                    }
                    else {
                        echo "<script>alert('Erreur lors de la modification du mot de passe. Veuillez réessayer plus tard.');</script>";
                    }

                }
                else {
                    echo "<script>alert('Sécurité du mot de passe insuffisante. Veuillez choisir un mot de passe plus fort.')</script>";
                }

            } 
            else {
                echo "<script>alert('Les informations ont été modifiées avec succès.');</script>";
            }

        }
        else { 
            echo "<script>alert('Le formulaire est incomplet. Veuillez remplir tous les champs obligatoires.')</script>";
        }
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* RECUPERATION LISTE DES ARTICLES                                                                              "TERMINE"
    ====================================================================================================================== */
    function getArticles()                                                                                                                                  // récupérer la liste des articles
    {
        $db = getConnexion();                                                                                                                               // je me connecte à la base de données

        $results = $db->query('SELECT * FROM articles');                                                                                                    // j'exécute une requête qui va récupérer tous les articles

        return $results->fetchAll();                                                                                                                        // je récupère les résultats et je les renvoie grâce à return
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* RECUPERATION LISTE DES GAMMES                                                                                "TERMINE"
    ====================================================================================================================== */
    function getGamme()                                                                                                                                     // récupérer la liste des gammes
    {
        $db = getConnexion();                                                                                                                               // je me connecte à la base de données

        $results = $db->query('SELECT * FROM gammes');                                                                                                      // j'exécute une requête qui va récupérer tous les articles

        return $results->fetchAll();                                                                                                                        // je récupère les résultats et je les renvoie grâce à return
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* RECUPERATION LISTE ARTICLES POUR UNE GAMME                                                                   "TERMINE"
    ====================================================================================================================== */
    function getArticlesBygamme($id) 
    {
        $db = getConnexion();                                                                                                                               // je me connecte à la base de données

        $query = $db->prepare('SELECT * FROM articles WHERE id_gamme = ?');                                                                                 // requête pour récupérer un article par son id_gamme

        $query->execute ([$id]);                                                                                                                            // exution avec le bon paramèter

        return $query->fetchAll();                                                                                                                          // je récupère l'article sous forme de tableau associatif
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* RECUPERATION D'ARTICLE PAR ID                                                                                "TERMINE"
    ====================================================================================================================== */
    function getArticleFromId($id) 
    {
        $db = getConnexion();                                                                                                                               // je me connecte à la base de données

        // jamais de variable php directement dans uen requete "risque d'injection SQL"

        $query = $db->prepare('SELECT * FROM Articles WHERE id = ?');                                                                                       // je prepare ma requête

        $query->execute([$id]);                                                                                                                             // je l'exécute avec le bon paramètre

        return $query->fetch();                                                                                                                             // je retourne l'article sous forme de tableau associatif
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* INITIALISATION PANIER                                                                                        "TERMINE"
    ====================================================================================================================== */
    function createCart() 
    {
        if (isset($_SESSION['panier']) == false)                                                                                                            // si mon panier n'existe pas encore 
        {                                                       
            $_SESSION['panier'] = [];                                                                                                                       // je l'initialise
        }
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* FONCTION QUANTITEE ARTICLE                                                                                   "TERMINE"
    ====================================================================================================================== */
    function addToCart($article) 
    {
        $article['quantite'] = 1;                                                                                                                           // on attribut une quandtité de 1 ( par defaut ) à l'article
        
        // je verifie si l'article n'est pas déja présent

        // $i = index de la boucle

        // $i < count($_SESSION['panier]) = condition de maintien de la boucle ( évaluée AVANT chaque tour )

        // (si condition vraie => on lance la boucle)

        // $i++ = évolution de l'index $i à la FIN de chaque boucle

        for ($i = 0; $i < count($_SESSION['panier']); $i++) 
        {

            if ($_SESSION['panier'][$i]['id'] == $article['id'])                                                                                            // si present = quantite +1
            {
                $_SESSION['panier'][$i]['quantite']++;
                return;                                                                                                                                     // permet de sortir de la fonction
            }
        }

        array_push($_SESSION['panier'], $article);                                                                                                          // si pas present => ajout classqiue via array_push
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* FONCTION TOTAL PANIER                                                                                        "TERMINE"
    ====================================================================================================================== */
    function totalPanier() 
    {
        $totalPanier = 0; 

        foreach ($_SESSION['panier'] as $article) 
        {
            $totalPanier += $article['quantite'] * $article['prix'];                                                                                        // Quantiter  X  prix 
        }
        return $totalPanier;
    }
    /* ------------------------------------------------------------------------------------------------------------------- */








    /* MODIFIER QUANTITE DE L'ARTICLE DANS LE PANIER                                                                "TERMINE"
    ====================================================================================================================== */
    function updateQuantity() 
    {
        for ($i = 0; $i < count($_SESSION['panier']); $i++)                                                                                                 // je boucle sur le panier => je cherche l'article à modifier 
        {

            if ($_SESSION['panier'][$i]['id'] == $_POST['modifiedArticleId'])                                                                               // des que je trouyve mon article 
            {

                $_SESSION['panier'][$i]['quantite'] = $_POST['newQuantity'];                                                                                // je remplace son ancienne quantite par la nouvelle 

                echo "<script> alert(\"Quantité modifiée !\");</script>";                                                                                   // j'affiche un message de succès dans une petite fenêtre via JavaScript 

                return;                                                                                                                                     // Je sort de la fonction pour eviter de boucler sur les articles suivants
            }
        }
    }
    /* ------------------------------------------------------------------------------------------------------------------- */








    /* SUPRESSION D'ARTICLE DANS LE PANIER                                                                          "TERMINE"
    ====================================================================================================================== */
    function deletedArticle($id)
    {
        for ($i = 0; $i < count($_SESSION['panier']); $i++)

        if ($_SESSION['panier'][$i]['id'] == $id) 
        {
            array_splice($_SESSION['panier'], $i, 1);
        }
    }
    /* ------------------------------------------------------------------------------------------------------------------- */








    /* VIDER PANIER                                                                                                 "TERMINE"
    ====================================================================================================================== */
    function viderPanier() 
    {
        $_SESSION['panier'] = array();
    }
    /* ------------------------------------------------------------------------------------------------------------------- */








    /* CALCULER LES FRAIS DE PORT                                                                                   "TERMINE"
    ====================================================================================================================== */
    function frais() 
    {
        $totalFrais = 0; 
        $fraisParArticle = 3;

        foreach ($_SESSION['panier'] as $article) 
        {
            $totalFrais += $article['quantite'] * $fraisParArticle;                                                                                         // Quantiter x prix 
        }

        return $totalFrais;
    }
    /* ------------------------------------------------------------------------------------------------------------------- */










    /* MODIFICATION ADRESSE                                                                                         "TERMINE"
    ====================================================================================================================== */
    function modifierAdresse()
    {
        $db = getConnexion();
    
        if (!checkEmptyFields()) 
        {
            // On récupère les données en les protégeant
            $adresse = strip_tags($_POST["adresse"]);
            $codePostal = strip_tags($_POST["code_postal"]);
            $ville = strip_tags($_POST["ville"]);
            $idClient = $_SESSION["user"]["id"];
    
            if (checkCaracteres()) 
            {
                $sql = "UPDATE `adresses` SET `adresse` = :adresse, `code_postal` = :code_postal, `ville` = :ville WHERE `id_client` = :id_client";
    
                $query = $db->prepare($sql);
                $query->bindValue(":adresse", $adresse, PDO::PARAM_STR);
                $query->bindValue(":code_postal", $codePostal, PDO::PARAM_STR);
                $query->bindValue(":ville", $ville, PDO::PARAM_STR);
                $query->bindValue(":id_client", $idClient, PDO::PARAM_INT);
    
                if ($query->execute()) 
                {
                    echo "<script>alert('Adresse modifiée avec succès.')</script>";
                }
                else {
                    echo "<script>alert('Une erreur est survenue lors de la modification de l'adresse. Veuillez réessayer.')</script>";
                }
            } 
            else {
                echo "<script>alert('Longueur des caractères insuffisante. Veuillez entrer des valeurs avec une longueur suffisante.')</script>";
            }
        } 
        else {
            echo "<script>alert('Le formulaire est incomplet. Veuillez remplir tous les champs obligatoires.')</script>";
        }
    }










    /* LISTE DES COMMANDES
    ====================================================================================================================== */
    function commandesArticles()
    {
        $db = getConnexion();
    }
    /* ------------------------------------------------------------------------------------------------------------------- */

?>