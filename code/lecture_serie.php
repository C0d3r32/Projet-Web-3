<?php
require '../db_connection.php';

$stmt = $pdo->query("SELECT * FROM serie");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID : " . $row['id'] . " - Titre : " . $row['titre'] . "<br>";
}
?>