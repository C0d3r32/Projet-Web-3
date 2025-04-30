<?php
require '../../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $photo = $_POST['photo'];

    if (empty($nom) || empty($photo)) {
        echo "Remplis tous les champs.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO realisateur (nom, photo) VALUES (:nom, :photo)");
        $stmt->execute(['nom' => $nom, 'photo' => $photo]);
        echo "Réalisateur ajouté.";
    }
}
?>
<form method="POST">
    <input type="text" name="nom" placeholder="Nom du réalisateur">
    <input type="text" name="photo" placeholder="Lien de la photo">
    <button type="submit">Ajouter Réalisateur</button>
</form>