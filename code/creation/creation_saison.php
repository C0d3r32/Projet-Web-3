<?php

require_once(dirname(__FILE__, 2) . '/../DB_CREDENTIALS.php');
require_once(dirname(__FILE__, 3) . '/classes/entities/saison.php');

use entities\Saison;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $affiche = $_POST['affiche'];
    $id_serie = $_POST['id_serie'];

    if (empty($numero) || empty($affiche) || empty($id_serie)) {
        echo "Remplis tous les champs.";
    } else {
        $pdoWrapper->exec(
            "INSERT INTO saison (numero, affiche, id_serie) VALUES (:numero, :affiche, :id_serie)",
            ['numero' => $numero, 'affiche' => $affiche, 'id_serie' => $id_serie]
        );

        $saison = new Saison($numero, $affiche, $id_serie); 
        echo "Saison ajoutée.";
    }
}
?>

<form method="POST">
    <input type="number" name="numero" placeholder="Numéro de saison" required>
    <input type="text" name="affiche" placeholder="Lien de l'affiche" required>
    <input type="number" name="id_serie" placeholder="ID de la série" required>
    <button type="submit">Ajouter Saison</button>
</form>
