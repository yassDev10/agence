<?php
    session_start();
    //Création des constantes
    define('SITEURL','http://localhost/Projet%20PHP%20MySQL%20-%20Restaurant%20en%20ligne/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD','');
    define('DB_NAME','agence');

    //Connexion sur la base de données MySQL avec l'utilisateur qui a les privilèges, gestion du code retour.
    $conn =mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    //Connexion à la base de données du restaurant
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
     
?>