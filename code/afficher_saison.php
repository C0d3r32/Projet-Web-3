<?php
require '../db_connection.php';

$stmt = $pdo->query('SELECT numero, affiche FROM saison');
$saisons = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des saisons</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Liste des saisons</h1>
    <div class="row">
        <?php foreach ($saisons as $saison): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($saison['affiche']); ?>" 
                         class="card-img-top" 
                         alt="Affiche saison <?php echo htmlspecialchars($saison['numero']); ?>">
                    <div class="card-body">
                        <h5 class="card-title">Saison <?php echo htmlspecialchars($saison['numero']); ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
        </body>
        </html>