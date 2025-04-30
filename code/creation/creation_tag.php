<?php
require '../../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];

    if (empty($nom)) {
        echo "Le nom du tag est obligatoire.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO tag (nom) VALUES (:nom)");
        $stmt->execute(['nom' => $nom]);
        echo "Tag ajouté.";
    }
}
?>
<form method="POST">
    <input type="text" name="nom" placeholder="Nom du tag">
    <button type="submit">Ajouter Tag</button>
</form>