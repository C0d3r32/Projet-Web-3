<?php

require_once(dirname(__FILE__, 2) . '/../DB_CREDENTIALS.php');  // Inclure les informations de connexion

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=seriesdb", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['titre']);
    $tags = isset($_POST['tags']) ? $_POST['tags'] : [];

    // Vérification des champs
    if (empty($title) || empty($tags)) {
        echo "<div class='alert alert-danger'>Remplis tous les champs !!</div>";
    } else {
        // Insérer la série
        $stmt = $pdo->prepare("INSERT INTO serie (titre) VALUES (:titre)");
        $stmt->execute(['titre' => $title]);

        // Récupérer l'ID de la série insérée
        $id_serie = $pdo->lastInsertId();

        // Ajouter les tags associés à la série
        foreach ($tags as $tag) {
            // Vérifier si le tag existe déjà
            $stmt = $pdo->prepare("SELECT id FROM tag WHERE nom = :nom");
            $stmt->execute(['nom' => trim($tag)]);
            $existingTag = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$existingTag) {
                // Si le tag n'existe pas, l'ajouter
                $stmt = $pdo->prepare("INSERT INTO tag (nom) VALUES (:nom)");
                $stmt->execute(['nom' => trim($tag)]);
                $id_tag = $pdo->lastInsertId();
            } else {
                // Si le tag existe déjà, récupérer son ID
                $id_tag = $existingTag['id'];
            }

            // Associer le tag à la série
            $stmt = $pdo->prepare("INSERT INTO serie_tag (id_serie, id_tag) VALUES (:id_serie, :id_tag)");
            $stmt->execute(['id_serie' => $id_serie, 'id_tag' => $id_tag]);
        }

        echo "<div class='alert alert-success'>La série est ajoutée.</div>";
    }
}
?>

<form method="POST">
    <input type="text" name="titre" placeholder="Titre" required>
    <input type="text" name="tags" placeholder="Tags (séparés par des virgules)" required>
    <button type="submit">Ajouter Série</button>
</form>
