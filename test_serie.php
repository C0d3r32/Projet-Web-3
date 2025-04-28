<?php
// Informations sur la BDD et le serveur qui la contient
$db_name = "projet" ;
 $db_host = "127.0.0.1" ; 
 $db_port = "3306" ;

// Informations d'authentification de votre script PHP :
$db_user = "root" ; 
$db_pwd = "" ;

try {
    $dsn = 'mysql:dbname=' . $db_name . ';host=' . $db_host . ';port=' . $db_port;
    $pdo = new PDO($dsn, $db_user, $db_pwd);

    // la requête
    $query = "SELECT * FROM serie"; 
    $stmt = $pdo->query($query);

    // On affiche les résultats
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID : " . $row['id_serie'] . " - Titre : " . $row['titre'] . "<br>";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
