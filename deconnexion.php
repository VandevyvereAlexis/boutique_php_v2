<?php
    
    session_start();                            // on demarre la sessions PHP.

    if(!isset($_SESSION["user"])) {             // permet d'éviter de retourner d'aller sur deconnexion quand l'utilisateur n'est pas connecter à la place on renvoie sur profil.php
        header("Location: connexion.php");      // si on est pas connecter on ne peut pas aller sur deconnexion mais sur connexion.php
        exit;
    }

    unset($_SESSION["user"]);                   // supprime une variable 

    header("Location: index.php");    
?>