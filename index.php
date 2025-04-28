<?php

// Informations sur la BDD et le serveur qui la contient
$db_name = "projet" ;
 $db_host = "127.0.0.1" ; 
 $db_port = "3306" ;

// Informations d'authentification de votre script PHP :
$db_user = "root" ; 
$db_pwd = "" ;

// Connexion à la BDD
try{
    // Agrégation des informations de connexion dans une chaine DSN (Data Source Name)
    $dsn = 'mysql:dbname=' . $db_name . ';host='. $db_host. ';port=' . $db_port;

    // Connexion et récupération de l'objet connecté
    $pdo = new PDO($dsn, $db_user, $db_pwd);
}

// Récupération d'une éventuelle erreur
catch (\Exception $ex){ ?>
    <!-- Affichage des informations liées à l'erreur-->
    <div style="color: red">
        <b>!!! ERREUR DE CONNEXION !!!</b><br>
        Code : <?= $ex->getCode() ?><br>
        Message : <?= $ex->getMessage() ?>
    </div><?php
    // Arrêt de l'exécution du script PHP
    die("-> Exécution stoppée <-") ;
}

// Poursuite de l'exécution du script ?>
<div style="color: green">Connecté à <b><?= $dsn ?></b></div> <?php