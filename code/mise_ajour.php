<?php
require '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_serie = $_POST['id_serie'];
    $new_title = $_POST['titre'];

    $stmt = $pdo->prepare("UPDATE serie SET titre = :titre WHERE id_serie = :id_serie");
    $stmt->execute(['titre' => $new_title, 'id_serie' => $id_serie]);

    echo "Série mise à jour avec succès.";
}
?>
<form method="POST">
    <input type="number" name="id_serie" placeholder="ID de la série" required>
    <input type="text" name="titre" placeholder="Nouveau titre" required>
    <button type="submit">Mettre à jour la série</button>
</form>