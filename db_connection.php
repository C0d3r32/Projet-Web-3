<?php

$db_name = "nboubeza";
$db_host = "192.168.22.48";
$db_port = "3306";
$db_user = "nboubeza";
$db_pwd = "22072003";

try {
    $dsn = 'mysql:dbname=' . $db_name . ';host=' . $db_host . ';port=' . $db_port;
    $pdo = new PDO($dsn, $db_user, $db_pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>