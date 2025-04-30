<?php
require '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_serie = $_POST['id_serie'];

    $stmt = $pdo->prepare("DELETE FROM serie WHERE id_serie = :id_serie");
    $stmt->execute(['id_serie' => $id_serie]);

    echo "série suppprimé avec succes";
}
?>
<form method="POST">
    <input type="number" name="id_serie" placeholder="ID de la série à supprimer" required>
    <button type="submit">Supprimer la série</button>
</form>