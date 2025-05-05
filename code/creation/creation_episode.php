<?php
require_once(dirname(__FILE__, 2) . '/../DB_CREDENTIALS.php');
require_once(dirname(__FILE__, 3) . '/classes/entities/episode.php');

use entities\Episode;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$numero = intval($_POST['numero']);
$titre = trim($_POST['titre']);
$synopsis = trim($_POST['synopsis']);
$duree = intval($_POST['duree']);
$id_saison = intval($_POST['id_saison']);
$id_realisateur = intval($_POST['id_realisateur']);

if (!$numero || empty($titre) || empty($synopsis) || !$duree || !$id_saison || !$id_realisateur) {
    echo "Tous les champs sont obligatoires.";
} else {
    $pdoWrapper->exec(
        "INSERT INTO episode (numero, titre, synopsis, duree, id_saison) 
         VALUES (:numero, :titre, :synopsis, :duree, :id_saison)",
        [
            'numero' => $numero,
            'titre' => $titre,
            'synopsis' => $synopsis,
            'duree' => $duree,
            'id_saison' => $id_saison
        ]
    );

    $id_episode = $pdoWrapper->getPDO()->lastInsertId();

    $pdoWrapper->exec(
        "INSERT INTO episode_realisateur (id_episode, id_realisateur) 
         VALUES (:id_episode, :id_realisateur)",
        [
            'id_episode' => $id_episode,
            'id_realisateur' => $id_realisateur
        ]
    );

    echo "Épisode $numero ajouté avec succès et lié au réalisateur.";
}

}
?>

<form method="POST">
    <input type="number" name="numero" placeholder="Numéro de l'épisode" required>
    <input type="text" name="titre" placeholder="Titre de l'épisode" required>
    <textarea name="synopsis" placeholder="Synopsis" required></textarea>
    <input type="number" name="duree" placeholder="Durée en minutes" required>
    <input type="number" name="id_saison" placeholder="ID de la saison" required>
    <input type="number" name="id_realisateur" placeholder="ID du réalisateur" required>
    <button type="submit">Ajouter Épisode</button>
</form>  