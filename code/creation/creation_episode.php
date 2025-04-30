<?php
require '../../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $realisateur = $_POST['realisateur'];
    $synopsis = $_POST['synopsis'];
    $duree = $_POST['duree'];
    $id_saison = $_POST['id_saison'];

    if (empty($titre) || empty($realisateur) || empty($synopsis) || empty($duree) || empty($id_saison)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO episode (titre, realisateur, synopsis, duree, id_saison) VALUES (:titre, :realisateur, :synopsis, :duree, :id_saison)");
        $stmt->execute([
            'titre' => $titre,
            'realisateur' => $realisateur,
            'synopsis' => $synopsis,
            'duree' => $duree,
            'id_saison' => $id_saison
        ]);
        echo "Épisode ajouté.";
    }
}
?>
<form method="POST">
    <input type="text" name="titre" placeholder="Titre de l'épisode">
    <input type="text" name="realisateur" placeholder="Réalisateur(s)">
    <textarea name="synopsis" placeholder="Synopsis"></textarea>
    <input type="number" name="duree" placeholder="Durée en minutes">
    <input type="number" name="id_saison" placeholder="ID de la saison">
    <button type="submit">Ajouter Épisode</button>
</form>