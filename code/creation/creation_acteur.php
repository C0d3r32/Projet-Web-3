<?php

require_once(dirname(__FILE__, 2) . '/../DB_CREDENTIALS.php');
require_once(dirname(__FILE__, 3) . '/classes/entities/acteur.php');

use entities\Acteur;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $photo = $_POST['photo'];

    if (empty($nom) || empty($photo)) {
        echo "Remplis tous les champs.";
    } else {

        $pdoWrapper->exec(
            "INSERT INTO acteur (nom, photo) VALUES (:nom, :photo)",
            ['nom' => $nom, 'photo' => $photo]
        );

        $personne = new Acteur($nom,$photo);
        echo "Acteur ajouté.";
    }
}
?>
<form method="POST">
    <input type="text" name="nom" placeholder="Nom de l'acteur">
    <input type="text" name="photo" placeholder="Lien de la photo">
    <button type="submit">Ajouter Acteur</button>
</form>
