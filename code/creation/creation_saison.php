<?php
require '../../db_connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $affiche = $_POST['affiche'];
    $id_serie = $_POST['id_serie'];

    if (empty($numero) || empty($affiche) || empty($id_serie)) {
        echo "Remplis tous les champs !";
    } else {
        $stmt = $pdo->prepare("INSERT INTO saison (numero, affiche, id_serie) VALUES (:numero, :affiche, :id_serie)");
        $stmt->execute(['numero' => $numero, 'affiche' => $affiche, 'id_serie' => $id_serie]);
        echo "Saison ajoutée.";
    }
}
?>
<form method="POST">
    <input type="number" name="numero" placeholder="Numéro de saison">
    <input type="text" name="affiche" placeholder="Lien de l'affiche">
    <input type="number" name="id_serie" placeholder="ID de la série">
    <button type="submit">Ajouter Saison</button>
</form>