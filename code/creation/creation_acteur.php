<?php

use entities\Acteur;
require '../../../db_connection.php';
require '../../classes/entities/personne.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $photo = $_POST['photo'];

    if (empty($nom) || empty($photo)) {
        echo "Remplis tous les champs.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO acteur (nom, photo) VALUES (:nom, :photo)");
        $stmt->execute(['nom' => $nom, 'photo' => $photo]);
        $personne = new Acteur($nom,$photo);
        echo var_dump($personne);
        echo "Acteur ajouté.";
    }
}
?>
<form method="POST">
    <input type="text" name="nom" placeholder="Nom de l'acteur">
    <input type="text" name="photo" placeholder="Lien de la photo">
    <button type="submit">Ajouter Acteur</button>
</form>