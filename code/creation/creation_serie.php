

<?php
/*
require '../../db_connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['titre'];
    $tags = $_POST['tags'];

    if (empty($title) || empty($tags)) {
        echo "<div class='alert alert-danger'>Remplie tous les champs !!</div>";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO serie (titre, tags) VALUES (:titre, :tags)");
            $stmt->execute(['titre' => $title, 'tags' => $tags]);
            echo "<div class='alert alert-success'>La serie est ajouté</div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Erreur lors de l'ajout de la série : " . $e->getMessage() . "</div>";
        }   
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Ajouter une Série</title>
</head>
<body>
<div class="container mt-5">
    <h2>Ajouter une Série</h2>
    <form method="POST">
        <div class="form-group">
            <label for="titre">Titre de la série</label>
            <input type="text" name="titre" class="form-control" placeholder="Titre de la série" required>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" class="form-control" placeholder="Tags (séparés par des virgules)" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter la série</button>
    </form>
</div>
</body>
</html>

*/
require '../../db_connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['titre'];
    $tags = $_POST['tags'];

    if (empty($title) || empty($tags)) {
        echo "<div class='alert alert-danger'>Remplis tous les champs !!</div>";
    } else {
        $stmt = $pdo->prepare("INSERT INTO serie (titre, tags) VALUES (:titre, :tags)");
        $stmt->execute(['titre' => $title, 'tags' => $tags]);
        echo "<div class='alert alert-success'>La série est ajoutée.</div>";
    }
}
?>
<form method="POST">
    <input type="text" name="titre" placeholder="Titre">
    <input type="text" name="tags" placeholder="Tags (séparés par des virgules)">
    <button type="submit">Ajouter Série</button>
</form>
</form>