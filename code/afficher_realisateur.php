<?php
require '../db_connection.php';

$stmt = $pdo->query('SELECT nom, photo FROM realisateur');
$realisateurs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des realisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Liste des realisateurs</h1>
    <div class="row">
        <?php foreach ($realisateurs as $realisateur): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($realisateur['photo']); ?>" 
                         class="card-img-top" 
                         alt="Affiche realisateur <?php echo htmlspecialchars($realisateur['nom']); ?>">
                    <div class="card-body">
                        <h5 class="card-title">Realisateur <?php echo htmlspecialchars($realisateur['nom']); ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
        </body>
        </html>