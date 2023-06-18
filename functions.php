<!-- SOMMAIRE
------------------------------------------------------------------------------------------------------------------- -->
<!--

    83.             CONNEXION A LA BASE DE DONNEES                                                          

    119.            FORMULAIRE D'INSCRIPTION (Nom + prenom + email + ville + code postal + adresse)                                        

    217.            VERIFICATION QU'AUCUN INPUT NE SOIT VIDE        

    246.            VERIFICATION QUE LE COMPTE NE SOIT PAS DEJA EXISTANT                                               

    273.            CHECK LONGUEUR DES CARACTERES                                    

    346.            REGEX POUR PASSWORD                                                           

    370.            FORMUALIRE CONNEXION                                                                      

    440.            FORMULAIRE MODIFICATION INFORMATION                                                                 

    495.            FORMUALIRE MODIFICATION MOT DE PASSE                                                     

    562.            RECUPERATION LISTE DES ARTICLES                                                   

    588.            RECUPERATION LISTE DES GAMMES                                                         

    614.            RECUPERATION LISTE ARTICLES POUR UNE GAMME                                                           

    642.            RECUPERATION D'ARTICLE PAR ID                                               

    670.            INITIALISATION PANIER                                                          

    695.            FONCTION QUANTITEE ARTICLE                                                                  

    733.            FONCTION TOTAL PANIER                                                             

    765.            MODIFIER QUANTITE DE L'ARTICLE DANS LE PANIER                                                                  

    800.            SUPRESSION D'ARTICLE DANS LE PANIER                                         

    829.            VIDER PANIER                                                   

    851.            CALCULER LES FRAIS DE PORT                                                                           

    881.            MODIFICATION ADRESSE                                                            

    942.            ENREGISTRE COMMANDE                                                       

    982.            ENREGISTRE CONTENU COMMANDE                                                                    

    1049.           FORMULAIRE D'INSCRIPTION (Nom + prenom + mail)

    ...

    ...

    ...

    ...

    ...

    ...

-->















<?php

    /* CONNEXION A LA BASE DE DONNEES                                                                              
    ---------------------------------------------------------------------------------------------------------------------- */
    function getConnexion()                                                                                                                                 
    {
        try                                                                                                                                                                 // Tentative de connexion à la base de données
        {                                                                                                                               
            $db = new PDO ('mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8',                                                                                    // Création d'une instance PDO pour la connexion à la base de données. La chaîne de connexion spécifie le type de base de données (MySQL), l'hôte (localhost), le nom de la base de données (boutique_en_ligne) et le jeu de caractères (utf8)
                'vdv_a',                                                                                                                                                    // 'vdv_a' est le nom d'utilisateur utilisé pour se connecter à la base de données
                'As-VDV_11/03',                                                                                                                                             // 'As-VDV_11/03' est le mot de passe utilisé pour se connecter à la base de données
                array (PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_ASSOC)                                                       // Le tableau d'options spécifie le mode d'affichage des erreurs (ERRMODE_EXCEPTION) et le mode de récupération des données (FETCH_ASSOC)
            );
        }   

        catch (Exception $erreur)                                                                                                                                           // Gestion des exceptions en cas d'échec de la connexion
        {                                                                                                                       
            die('Erreur : ' . $erreur->getMessage());                                                                                                                       // Si une exception est levée lors de la connexion à la base de données, le code dans le bloc catch est exécuté. La variable $erreur contient l'objet d'exception qui contient des informations sur l'erreur. 'Erreur : ' . $erreur->getMessage() est une chaîne de texte qui affiche le message d'erreur spécifique à l'exception. La fonction die() affiche le message d'erreur et arrête l'exécution du script
        }

        return $db;                                                                                                                                                         // Retourne la connexion à la base de données. Si la connexion est établie avec succès, elle est renvoyée pour être utilisée dans d'autres parties du code
    }
    /* =================================================================================================================== */















    /* FORMULAIRE D'INSCRIPTION (Nom + prenom + email + ville + code postal + adresse)                              
    ---------------------------------------------------------------------------------------------------------------------- */
    function getInscription()
    {
        $db = getConnexion();                                                                                                                                               // Étape 1: Récupérer la connexion à la base de données

        if (!checkEmptyFields())                                                                                                                                            // Étape 2: Vérifier si les champs sont vides
        {                                                                                                                                                  

            $nom = strip_tags($_POST["nom"]);                                                                                                                               // Étape 3: Récupérer et nettoyer la valeur du champ "nom"
            $prenom = strip_tags($_POST["prenom"]);                                                                                                                         // Étape 4: Récupérer et nettoyer la valeur du champ "prenom"
            $email = strip_tags($_POST["email"]);                                                                                                                           // Étape 5: Récupérer et nettoyer la valeur du champ "email"
            $password = strip_tags($_POST["password"]);                                                                                                                     // Étape 6: Récupérer et nettoyer la valeur du champ "password"
            $adresse = strip_tags($_POST["adresse"]);                                                                                                                       // Étape 7: Récupérer et nettoyer la valeur du champ "adresse"
            $codePostal = strip_tags($_POST["code_postal"]);                                                                                                                // Étape 8: Récupérer et nettoyer la valeur du champ "code_postal"
            $ville = strip_tags($_POST["ville"]);                                                                                                                           // Étape 9: Récupérer et nettoyer la valeur du champ "ville"

            if (checkCaracteres())                                                                                                                                          // Étape 10: Vérifier si les caractères sont valides
            {

                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))                                                                                                     // Étape 11: Vérifier si l'email est au format valide
                {

                    if (!checkEmail($email))                                                                                                                                // Étape 12: Vérifier si l'email n'est pas déjà utilisé
                    {

                        if (checkPassword($_POST["password"]))                                                                                                              // Étape 13: Vérifier si le mot de passe est sécurisé
                        {

                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);                                                                                // Hacher le mot de passe

                            $sql = "INSERT INTO `clients`(`nom`, `prenom`, `email`, `password`) VALUES (:nom, :prenom, :email, :password)";                                 // Étape 14: Préparer et exécuter une requête d'insertion pour ajouter le client dans la table "clients"
                            $query = $db->prepare($sql);
                            $query->bindValue(":nom", $nom, PDO::PARAM_STR);
                            $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                            $query->bindValue(":email", $email, PDO::PARAM_STR);
                            $query->bindValue(":password", $password, PDO::PARAM_STR);

                            if ($query->execute()) 
                            {

                                $id_client = $db->lastInsertId();                                                                                                           // Étape 15: Récupérer l'ID du client nouvellement inséré

                                $sql = "INSERT INTO `adresses`(`adresse`, `code_postal`, `ville`, `id_client`) VALUES (:adresse, :code_postal, :ville, :id_client)";        // Étape 16: Préparer et exécuter une requête d'insertion pour ajouter l'adresse du client dans la table "adresses"
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
    /* =================================================================================================================== */















    /* VERIFICATION QU'AUCUN INPUT NE SOIT VIDE                                                                     
    ---------------------------------------------------------------------------------------------------------------------- */
    function checkEmptyFields()
    {
        foreach ($_POST as $field)                                                                                                                                          // Parcourt chaque élément du tableau $_POST
        {
            if (empty($field))                                                                                                                                              // Vérifie si le champ est vide
            {
                return true;                                                                                                                                                // Retourne true si au moins un champ est vide
            }
        }
        return false;                                                                                                                                                       // Retourne false si tous les champs sont remplis
    }
    /* =================================================================================================================== */















    /* VERIFICATION QUE LE COMPTE NE SOIT PAS DEJA EXISTANT                                                         
    ---------------------------------------------------------------------------------------------------------------------- */
    function checkEmail($email)
    {
        $db = getConnexion();                                                                                                                                               // Étape 1: Récupérer la connexion à la base de données

        $query = $db->prepare("SELECT * FROM clients WHERE email = ?");                                                                                                     // Étape 2: Préparer une requête SELECT pour récupérer les enregistrements avec l'email donné
        $query->execute([$email]);                                                                                                                                          // Étape 3: Exécuter la requête en passant la valeur de l'email comme paramètre

        return $query->fetch();                                                                                                                                             // Étape 4: Retourner le résultat de la requête (la première ligne de résultat) ou false si aucun enregistrement n'est trouvé
    }
    /* =================================================================================================================== */















    /* CHECK LONGUEUR DES CARACTERES                                                                                
    ---------------------------------------------------------------------------------------------------------------------- */
    function checkCaracteres()
    {
        $inputsLenghtOk = true;                                                                                                                                             // Variable pour stocker l'état de la longueur des champs


        if (isset($_POST["nom"]))                                                                                                                                           // Vérifie si le champ "nom" existe dans le tableau $_POST
        {
            if (strlen($_POST['nom']) > 25 || strlen($_POST['nom']) < 3)                                                                                                    // Vérifie si la longueur du champ "nom" est supérieure à 25 caractères ou inférieure à 3 caractères
            {
                $inputsLenghtOk = false;                                                                                                                                    // Met la variable $inputsLenghtOk à false pour indiquer une longueur de champ incorrecte
            }
        }

        if (isset($_POST["prenom"]))                                                                                                                                        // Vérifie si le champ "prenom" existe dans le tableau $_POST
        {
            if (strlen($_POST['prenom']) > 25 || strlen($_POST['prenom']) < 3)                                                                                              // Vérifie si la longueur du champ "prenom" est supérieure à 25 caractères ou inférieure à 3 caractères
            {
                $inputsLenghtOk = false;                                                                                                                                    // Met la variable $inputsLenghtOk à false pour indiquer une longueur de champ incorrecte
            }
        }

        if (isset($_POST["email"]))                                                                                                                                         // Vérifie si le champ "email" existe dans le tableau $_POST
        {
            if (strlen($_POST['email']) > 25 || strlen($_POST['email']) < 5)                                                                                                // Vérifie si la longueur du champ "email" est supérieure à 25 caractères ou inférieure à 5 caractères
            {
                $inputsLenghtOk = false;                                                                                                                                    // Met la variable $inputsLenghtOk à false pour indiquer une longueur de champ incorrecte
            }
        }

        if (isset($_POST["adresse"]))                                                                                                                                       // Vérifie si le champ "adresse" existe dans le tableau $_POST
        {
            if (strlen($_POST['adresse']) > 40 || strlen($_POST['adresse']) < 5)                                                                                            // Vérifie si la longueur du champ "adresse" est supérieure à 40 caractères ou inférieure à 5 caractères
            {
                $inputsLenghtOk = false;                                                                                                                                    // Met la variable $inputsLenghtOk à false pour indiquer une longueur de champ incorrecte
            }
        }
    
        if (isset($_POST["code_postal"]))                                                                                                                                   // Vérifie si le champ "code_postal" existe dans le tableau $_POST
        {
            if (strlen($_POST['code_postal']) !== 5)                                                                                                                        // Vérifie si la longueur du champ "code_postal" est différente de 5 caractères
            {
                $inputsLenghtOk = false;                                                                                                                                    // Met la variable $inputsLenghtOk à false pour indiquer une longueur de champ incorrecte
            }
        }
    
        if (isset($_POST["ville"]))                                                                                                                                         // Vérifie si le champ "ville" existe dans le tableau $_POST
        {
            if (strlen($_POST['ville']) > 25 || strlen($_POST['ville']) < 3)                                                                                                // Vérifie si la longueur du champ "ville" est supérieure à 25 caractères ou inférieure à 3 caractères
            {
                $inputsLenghtOk = false;                                                                                                                                    // Met la variable $inputsLenghtOk à false pour indiquer une longueur de champ incorrecte
            }
        }

        return $inputsLenghtOk;                                                                                                                                             // Retourne l'état de la longueur des champs (true si tous les champs ont une longueur valide, false sinon)                                                                                                                   
    }
    /* =================================================================================================================== */















    /* REGEX POUR PASSWORD                                                                                          
    ---------------------------------------------------------------------------------------------------------------------- */
    function checkPassword($password)    
    { 
        $regex = "^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@$!%*?/&])(?=\S+$).{8,15}$^";                                                                                             // Expression régulière pour vérifier la force du mot de passe : - Minimum 8 caractères et maximum 15 - Au moins 1 lettre, 1 chiffre et 1 caractère spécial

        return preg_match($regex, $password);                                                                                                                               // Utilise la fonction preg_match() pour vérifier si le mot de passe correspond à l'expression régulière. Retourne true si le mot de passe est valide selon les critères définis, sinon retourne false
    }
    /* =================================================================================================================== */















    /* FORMUALIRE CONNEXION                                                                                        
    ---------------------------------------------------------------------------------------------------------------------- */
    function getFormConnex()
    {
        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données

        if (checkEmptyFields())                                                                                                                                             // Vérifie si tous les champs sont saisis en utilisant la fonction checkEmptyFields()                                                                                                                          
        {                                                                                                

            if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))                                                                                                          // Vérifie si l'adresse email est valide en utilisant filter_var() avec le filtre FILTER_VALIDATE_EMAIL                                                                                 
            {                                                        

                $sql = "SELECT * FROM `clients` WHERE `email` = :email";                                                                                                    // Requête SQL pour sélectionner les enregistrements correspondant à l'adresse email fournie
                $query = $db->prepare($sql);

                $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);                                                                                               // Lie la valeur du paramètre :email à la valeur de $_POST["email"] dans la requête préparée

                $query->execute();                                                                                                                                          // Exécute la requête préparée

                $user = $query->fetch();                                                                                                                                    // Récupère la première ligne de résultat de la requête

                if($user)                                                                                                                                                   // Vérifie si l'utilisateur existe dans la base de données
                {

                    if(password_verify($_POST["password"], $user["password"]))                                                                                              // Vérifie si le mot de passe saisi correspond au mot de passe haché stocké dans la base de données                                                               
                    {                                                   

                        $_SESSION["user"] = [                                                                                                                               // Les informations d'identification sont correctes, on peut connecter l'utilisateur. Stocke les informations de l'utilisateur dans la variable de session $_SESSION                                                                                      
                            "id"        => $user["id"],
                            "nom"       => $user["nom"],
                            "prenom"    => $user["prenom"],
                            "email"     => $user["email"]
                        ];                                                                                                   

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
    /* =================================================================================================================== */















    /* FORMULAIRE MODIFICATION INFORMATION                                                                      
    ---------------------------------------------------------------------------------------------------------------------- */
    function modifInfos()
    {
        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données                                                                                                                                       

        if (checkEmptyFields())                                                                                                                                             // Vérifie si le formulaire a été envoyé en utilisant la fonction checkEmptyFields()                                                                                                                                                                                                                              
        {

            $nom = strip_tags($_POST["nom"]);                                                                                                                               // Récupère les valeurs des champs 'nom' du formulaire                                                                                                                  
            $prenom = strip_tags($_POST["prenom"]);                                                                                                                         // Récupère les valeurs des champs 'prenom' du formulaire

            if (checkCaracteres())                                                                                                                                          // Vérifie si les caractères sont suffisamment longs en utilisant la fonction checkCaracteres()                                                                                                                                                                                         
            {                                                                                                                                                                                                                                                     

                $sql = "UPDATE `clients` SET `nom`=:nom, `prenom`=:prenom WHERE id = :id";                                                                                  // Requête SQL pour mettre à jour les valeurs 'nom' et 'prenom' dans la table 'clients' pour l'utilisateur avec l'ID spécifié
                $query = $db->prepare($sql); 

                $query->bindValue(":nom", $nom, PDO::PARAM_STR);                                                                                                            // Lie les valeurs des paramètres dans la requête préparée
                $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                $query->bindValue(":id", $_SESSION["user"]["id"], PDO::PARAM_STR);                                                                

                $query->execute();                                                                                                                                          // Exécute la requête préparée

                $_SESSION["user"]["nom"] = $nom;                                                                                                                            // Met à jour seulement les valeurs 'nom' et 'prenom' dans la session3
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
    /* =================================================================================================================== */















    /* FORMUALIRE MODIFICATION MOT DE PASSE                                                                         
    ---------------------------------------------------------------------------------------------------------------------- */
    function modifPassword()
    {
        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données

        if (checkEmptyFields())                                                                                                                                             // Vérifie si le formulaire a été envoyé en utilisant la fonction checkEmptyFields()                                                                                                                         
        {

            $client = checkEmail($_SESSION['user']['email']);                                                                                                               // Appelle la fonction checkEmail() pour obtenir les informations du client en fonction de son email. La variable $client contient maintenant les informations du client, y compris son ID

            $oldPassword = strip_tags($_POST["old_password"]);                                                                                                              // Récupère les valeurs de l'ancien mot de passe et du nouveau mot de passe du formulaire                                                                                  
            $newPassword = strip_tags($_POST["new_password"]);                                                                                              

            if (password_verify($oldPassword, $client["password"]))                                                                                                         // Vérifie si l'ancien mot de passe correspond au mot de passe actuel du client
            {   

                if (checkPassword($newPassword))                                                                                                                            // Vérifie la sécurité du nouveau mot de passe en utilisant la fonction checkPassword()                                                                                          
                {

                    $password = password_hash($newPassword, PASSWORD_DEFAULT);                                                                                              // Hash le nouveau mot de passe pour le stocker en toute sécurité                                                                      

                    $sql = "UPDATE `clients` SET `password`=:password WHERE id = :id";                                                                                      // Requête SQL pour mettre à jour le mot de passe dans la table 'clients' pour le client avec l'ID spécifié
                    $query = $db->prepare($sql);

                    $query->bindValue(":password", $password, PDO::PARAM_STR);                                                                                              // Lie les valeurs des paramètres dans la requête préparée
                    $query->bindValue(":id", $client["id"], PDO::PARAM_INT);                                                                                

                    if ($query->execute())                                                                                                                                  // Exécute la requête préparée
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
    /* =================================================================================================================== */















    /* RECUPERATION LISTE DES ARTICLES                                                                              
    ---------------------------------------------------------------------------------------------------------------------- */
    function getArticles()                                                                                                                                  
    {
        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données                                                                   

        $results = $db->query('SELECT * FROM articles');                                                                                                                    // Exécute une requête pour sélectionner tous les articles de la table 'articles'                                                                        

        return $results->fetchAll();                                                                                                                                        // Récupère tous les résultats de la requête et les retourne sous forme de tableau                                                                                                                   
    }
    /* =================================================================================================================== */















    /* RECUPERATION LISTE DES GAMMES                                                                              
    ---------------------------------------------------------------------------------------------------------------------- */
    function getGamme()                                                                                                                                     
    {
        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données                                                                                                    

        $results = $db->query('SELECT * FROM gammes');                                                                                                                      // Exécute une requête pour sélectionner toutes les gammes de la table 'gammes'                                                         

        return $results->fetchAll();                                                                                                                                        // Récupère tous les résultats de la requête et les retourne sous forme de tableau
    }
    /* =================================================================================================================== */















    /* RECUPERATION LISTE ARTICLES POUR UNE GAMME                                                                
    ---------------------------------------------------------------------------------------------------------------------- */
    function getArticlesBygamme($id) 
    {
        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données                                                                                                                      

        $query = $db->prepare('SELECT * FROM articles WHERE id_gamme = ?');                                                                                                 // Prépare une requête pour sélectionner tous les articles de la gamme spécifiée par l'ID                                                 

        $query->execute ([$id]);                                                                                                                                            // Exécute la requête en remplaçant le paramètre '?' par la valeur de l'ID passé en argument                                                                                                                      

        return $query->fetchAll();                                                                                                                                          // Récupère tous les résultats de la requête et les retourne sous forme de tableau                                                                       
    }
    /* =================================================================================================================== */















    /* RECUPERATION D'ARTICLE PAR ID                                                                            
    ---------------------------------------------------------------------------------------------------------------------- */
    function getArticleFromId($id) 
    {
        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données                                                                                                  

        $query = $db->prepare('SELECT * FROM Articles WHERE id = ?');                                                                                                       // Prépare une requête pour sélectionner l'article avec l'ID spécifié                                                                          

        $query->execute([$id]);                                                                                                                                             // Exécute la requête en remplaçant le paramètre '?' par la valeur de l'ID passé en argument                                                                                                                 

        return $query->fetch();                                                                                                                                             // Récupère le premier résultat de la requête et le retourne                                           
    }
    /* =================================================================================================================== */















    /* INITIALISATION PANIER                                                                                  
    ---------------------------------------------------------------------------------------------------------------------- */
    function createCart() 
    {
        if (isset($_SESSION['panier']) == false)                                                                                                                            // Vérifie si la clé 'panier' existe dans la variable $_SESSION                                                                                         
        {                                                       
            $_SESSION['panier'] = [];                                                                                                                                       // Si la clé 'panier' n'existe pas, crée un nouveau panier vide dans $_SESSION
        }
    }
    /* =================================================================================================================== */















    /* FONCTION QUANTITEE ARTICLE                                                                                 
    ---------------------------------------------------------------------------------------------------------------------- */
    function addToCart($article) 
    {
        $article['quantite'] = 1;                                                                                                                                           // Initialise la quantité de l'article à 1                                                                                                                  

        for ($i = 0; $i < count($_SESSION['panier']); $i++)                                                                                                                 // Parcours le panier existant dans $_SESSION
        {

            if ($_SESSION['panier'][$i]['id'] == $article['id'])                                                                                                            // Vérifie si un article avec le même ID existe déjà dans le panier                                                                          
            {

                $_SESSION['panier'][$i]['quantite']++;                                                                                                                      // Si oui, incrémente la quantité de l'article dans le panier existant
                return;    

            }

        }

        array_push($_SESSION['panier'], $article);                                                                                                                          // Si l'article n'existe pas déjà dans le panier, l'ajoute au panier dans $_SESSION     

    }
    /* =================================================================================================================== */















    /* FONCTION TOTAL PANIER                                                                                
    ---------------------------------------------------------------------------------------------------------------------- */
    function totalPanier() 
    {
        $totalPanier = 0;                                                                                                                                                   // Initialise la variable $totalPanier à 0

        foreach ($_SESSION['panier'] as $article)                                                                                                                           // Parcours chaque article dans le panier
        {

            $totalPanier += $article['quantite'] * $article['prix'];                                                                                                        // Calcule le sous-total de l'article en multipliant sa quantité par son prix

        }

        return $totalPanier;                                                                                                                                                // Retourne le montant total du panier

    }
    /* =================================================================================================================== */















    /* MODIFIER QUANTITE DE L'ARTICLE DANS LE PANIER                                                               
    ---------------------------------------------------------------------------------------------------------------------- */
    function updateQuantity() 
    {
        for ($i = 0; $i < count($_SESSION['panier']); $i++)                                                                                                                 // Parcours chaque article dans le panier                                                                                          
        {

            if ($_SESSION['panier'][$i]['id'] == $_POST['modifiedArticleId'])                                                                                               // Vérifie si l'ID de l'article correspond à l'ID fourni dans $_POST['modifiedArticleId']                                                                        
            {

                $_SESSION['panier'][$i]['quantite'] = $_POST['newQuantity'];                                                                                                // Met à jour la quantité de l'article avec la nouvelle quantité fournie dans $_POST['newQuantity']                                                       

                echo "<script> alert(\"Quantité modifiée !\");</script>";                                                                                                   // Affiche un message d'alerte indiquant que la quantité a été modifiée avec succès                                                               

                return;                                                                                                                                                     // Termine la fonction après la modification

            }
        }
    }
    /* =================================================================================================================== */















    /* SUPRESSION D'ARTICLE DANS LE PANIER                                                                         
    ---------------------------------------------------------------------------------------------------------------------- */
    function deletedArticle($id)
    {
        for ($i = 0; $i < count($_SESSION['panier']); $i++)                                                                                                                 // Parcours chaque article dans le panier

        if ($_SESSION['panier'][$i]['id'] == $id)                                                                                                                           // Vérifie si l'ID de l'article correspond à l'ID fourni en paramètre
        {
            array_splice($_SESSION['panier'], $i, 1);                                                                                                                       // Supprime l'article du panier en utilisant la fonction array_splice() pour supprimer l'élément à l'index $i. Note: array_splice() est utilisée ici pour supprimer l'élément du tableau tout en préservant les clés des autres éléments du panier.

            return;                                                                                                                                                         // Termine la fonction après la suppression de l'article
        }
    }
    /* =================================================================================================================== */















    /* VIDER PANIER                                                                                               
    ---------------------------------------------------------------------------------------------------------------------- */
    function viderPanier() 
    {
        $_SESSION['panier'] = array();                                                                                                                                      // Remplace le contenu du panier par un tableau vide. Note: Cette fonction vide complètement le panier en réinitialisant la variable de session 'panier' avec un tableau vide.
    }
    /* =================================================================================================================== */















    /* CALCULER LES FRAIS DE PORT                                                                                  
    ---------------------------------------------------------------------------------------------------------------------- */
    function frais() 
    {
        $totalFrais = 0;                                                                                                                                                    // Initialise la variable $totalFrais à 0
        $fraisParArticle = 3;                                                                                                                                               // Définit le montant des frais par article

        foreach ($_SESSION['panier'] as $article)                                                                                                                           // Parcours chaque article dans le panier
        {
            $totalFrais += $article['quantite'] * $fraisParArticle;                                                                                                         // Calcule le total des frais en multipliant la quantité de chaque article par le montant des frais par article
        }

        return $totalFrais;                                                                                                                                                 // Retourne le total des frais
    }
    /* =================================================================================================================== */















    /* MODIFICATION ADRESSE                                                                                       
    ---------------------------------------------------------------------------------------------------------------------- */
    function modifierAdresse()
    {

        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données
    
        if (!checkEmptyFields())                                                                                                                                            // Vérifie si le formulaire n'est pas vide
        {

            $adresse = strip_tags($_POST["adresse"]);                                                                                                                       // Récupère l'adresse en la nettoyant
            $codePostal = strip_tags($_POST["code_postal"]);                                                                                                                // Récupère le code postal en le nettoyant
            $ville = strip_tags($_POST["ville"]);                                                                                                                           // Récupère la ville en la nettoyant
            $idClient = $_SESSION["user"]["id"];                                                                                                                            // Récupère l'ID du client à partir de la session

            if (checkCaracteres())                                                                                                                                          // Vérifie la longueur des caractères
            {

                $sql = "UPDATE `adresses` SET `adresse` = :adresse, `code_postal` = :code_postal, `ville` = :ville WHERE `id_client` = :id_client";
                $query = $db->prepare($sql);                                                                                                                                // Prépare la requête SQL

                $query->bindValue(":adresse", $adresse, PDO::PARAM_STR);                                                                                                    // Lie le paramètre :adresse avec la variable $adresse
                $query->bindValue(":code_postal", $codePostal, PDO::PARAM_STR);                                                                                             // Lie le paramètre :code_postal avec la variable $codePostal
                $query->bindValue(":ville", $ville, PDO::PARAM_STR);                                                                                                        // Lie le paramètre :ville avec la variable $ville
                $query->bindValue(":id_client", $idClient, PDO::PARAM_INT);                                                                                                 // Lie le paramètre :id_client avec la variable $idClient

                if ($query->execute())                                                                                                                                      // Exécute la requête SQL
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
    /* =================================================================================================================== */















    /* ENREGISTRE COMMANDE
    ---------------------------------------------------------------------------------------------------------------------- */
    function enregistrerCommande()
    {

        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données

        $sql = "INSERT INTO commandes (id_client, numero, date_commande, prix) VALUES(:id_client, :numero, :date_commande, :prix)";

        $query = $db->prepare($sql);                                                                                                                                        // Obtient la connexion à la base de données

        $id_client = $_SESSION['user']['id'];                                                                                                                               // Récupère l'ID du client à partir de la session
        $numero = rand(1000000, 9999999);                                                                                                                                   // Génère un numéro de commande aléatoire entre 1000000 et 9999999
        $date_commande = date("Y-m-d");                                                                                                                                     // Récupère la date actuelle
        $prix = totalPanier();                                                                                                                                              // Récupère le prix total du panier en appelant la fonction totalPanier()

        $query->bindParam(':id_client', $id_client, PDO::PARAM_INT);                                                                                                        // Lie le paramètre :id_client avec la variable $id_client
        $query->bindParam(':numero', $numero, PDO::PARAM_INT);                                                                                                              // Lie le paramètre :numero avec la variable $numero
        $query->bindParam(':date_commande', $date_commande);                                                                                                                // Lie le paramètre :date_commande avec la variable $date_commande
        $query->bindParam(':prix', $prix);                                                                                                                                  // Lie le paramètre :prix avec la variable $prix

        $query->execute();                                                                                                                                                  // Exécute la requête SQL pour insérer la commande dans la base de données

    }
    /* =================================================================================================================== */















    /* ENREGISTRE CONTENU COMMANDE
    ---------------------------------------------------------------------------------------------------------------------- */
    function sauvegarderContenuCommande()
    {

        $db = getConnexion();                                                                                                                                               // Obtient la connexion à la base de données

        $sql = "INSERT INTO commandes (id_client, numero, date_commande, prix) VALUES(:id_client, :numero, :date_commande, :prix)";
        $query = $db->prepare($sql);                                                                                                                                        // Prépare la requête SQL

        $id_client = $_SESSION['user']['id'];                                                                                                                               // Récupère l'ID du client à partir de la session
        $numero = rand(1000000, 9999999);                                                                                                                                   // Génère un numéro de commande aléatoire entre 1000000 et 9999999
        $date_commande = date("Y-m-d");                                                                                                                                     // Récupère la date actuelle
        $prix = totalPanier();                                                                                                                                              // Récupère le prix total du panier en appelant la fonction totalPanier()

        $query->bindParam(':id_client', $id_client, PDO::PARAM_INT);                                                                                                        // Lie le paramètre :id_client avec la variable $id_client
        $query->bindParam(':numero', $numero, PDO::PARAM_INT);                                                                                                              // Lie le paramètre :numero avec la variable $numero
        $query->bindParam(':date_commande', $date_commande);                                                                                                                // Lie le paramètre :date_commande avec la variable $date_commande
        $query->bindParam(':prix', $prix);                                                                                                                                  // Lie le paramètre :prix avec la variable $prix

        if ($query->execute()) 
        {

            $id_commande = $db->lastInsertId();                                                                                                                             // Récupère l'ID de la commande nouvellement insérée

            $sql = "INSERT INTO commande_articles (id_commande, id_article, quantite) VALUES(:id_commande, :id_article, :quantity)";
            $query = $db->prepare($sql);                                                                                                                                    // Prépare la requête SQL pour insérer les articles de la commande

            foreach ($_SESSION['panier'] as $article) 
            {

                $id_article = $article['id'];
                $quantite = $article['quantite'];

                $query->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);                                                                                            // Lie le paramètre :id_commande avec l'ID de la commande
                $query->bindParam(':id_article', $id_article, PDO::PARAM_INT);                                                                                              // Lie le paramètre :id_article avec l'ID de l'article
                $query->bindParam(':quantity', $quantite, PDO::PARAM_INT);                                                                                                  // Lie le paramètre :quantity avec la quantité de l'article

                $query->execute();                                                                                                                                          // Exécute la requête SQL pour insérer chaque article de la commande
            }

            $sql = "SELECT * FROM commande_articles WHERE id_commande = :id_commande";                                                                                      // Vérifier le résultat en base de données (table commande_articles)
            $query = $db->prepare($sql);                                                                                                                                    // Prépare la requête SQL pour récupérer les articles de la commande
            $query->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);                                                                                                // Lie le paramètre :id_commande avec l'ID de la commande
            $query->execute();                                                                                                                                              // Exécute la requête SQL
            $result = $query->fetchAll(PDO::FETCH_ASSOC);                                                                                                                   // Récupère le résultat sous forme de tableau associatif

            var_dump($result);                                                                                                                                              // Traiter le résultat (ici, affichage avec var_dump())

        }
    }
    /* =================================================================================================================== */















    /* FORMULAIRE D'INSCRIPTION (Nom + prenom + mail)                                                               
    ---------------------------------------------------------------------------------------------------------------------- */
    /*function getInscription()
    {
        $db = getConnexion();                                                                                                                                               // Obtention de la connexion à la base de données en appelant la fonction getConnexion()

        if (!checkEmptyFields())                                                                                                                                            // Vérification si le formulaire a été envoyé et si les champs ne sont pas vides
        {                    

            // On récupère les données en les protégeant
            $nom = strip_tags($_POST["nom"]);                                                                                                                               // Récupération et protection des données du champ "nom" en supprimant les balises HTML potentiellement dangereuses
            $prenom = strip_tags($_POST["prenom"]);                                                                                                                         // Récupération et protection des données du champ "prenom" en supprimant les balises HTML potentiellement dangereuses
            $email = strip_tags($_POST["email"]);                                                                                                                           // Récupération et protection des données du champ "email" en supprimant les balises HTML potentiellement dangereuses
            $password = strip_tags($_POST["password"]);                                                                                                                     // Récupération et protection des données du champ "password" en supprimant les balises HTML potentiellement dangereuses

            if (checkCaracteres())                                                                                                                                          // Vérification des caractères dans les champs
            {

                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))                                                                                                     // Validation de l'adresse email saisie
                {

                    if (!checkEmail($email))                                                                                                                                // Vérification si l'adresse email existe déjà dans la base de données
                    {

                        if (checkPassword($_POST["password"]))                                                                                                              // Vérification de la sécurité du mot de passe en utilisant une fonction de vérification basée sur une expression régulière (regex) 
                        {

                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);                                                                                // Hachage du mot de passe avant de le stocker dans la base de données

                            $sql = "INSERT INTO `clients`(`nom`, `prenom`, `email`, `password`) VALUES (:nom, :prenom, :email, :password)";

                            $query = $db->prepare($sql);                                                                                                                    // Préparation de la requête SQL pour l'insertion des données du nouvel utilisateur

                            $query->bindValue(":nom", $nom, PDO::PARAM_STR);                                                                                                // Affectation des valeurs des paramètres à partir des variables sécurisées
                            $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                            $query->bindValue(":email", $email, PDO::PARAM_STR);
                            $query->bindValue(":password", $password, PDO::PARAM_STR);

                            $query->execute();                                                                                                                              // Exécution de la requête d'insertion des données

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
    /* =================================================================================================================== */

?>