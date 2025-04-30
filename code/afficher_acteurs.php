<?php
require '../db_connection.php';

$stmt = $pdo->query('SELECT nom, photo FROM acteur');
$acteurs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Acteurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Liste des Acteurs</h1>
    <div class="row">
        <?php foreach ($acteurs as $acteur): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($acteur['photo']); ?>" 
                         class="card-img-top" 
                         alt="Affiche acteur <?php echo htmlspecialchars($acteur['nom']); ?>">
                    <div class="card-body">
                        <h5 class="card-title">Acteur <?php echo htmlspecialchars($acteur['nom']); ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
        </body>
        </html>