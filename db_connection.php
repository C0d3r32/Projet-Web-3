<?php

$db_name = "test";
$db_host = "127.0.0.1";
$db_port = "3306";
$db_user = "root";
$db_pwd = "";

try {
    $dsn = 'mysql:dbname=' . $db_name . ';host=' . $db_host . ';port=' . $db_port;
    $pdo = new PDO($dsn, $db_user, $db_pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    // Message de connexion réussie
    //echo "Connexion réussie à la base de données '$db_name'.";

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>