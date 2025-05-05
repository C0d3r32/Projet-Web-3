<?php
require_once(dirname(__FILE__, 1) . '/../DB_CREDENTIALS.php');

$Realisateurs = $pdoWrapper->exec('SELECT nom, photo FROM realisateur', [], null); 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Realisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Liste des Realisateurs</h1>
    <div class="row">
        <?php foreach ($Realisateurs as $realisateur): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($realisateur->photo); ?>" 
                         class="card-img-top" 
                         alt="Affiche realisateur <?php echo htmlspecialchars($realisateur->nom); ?>">
                    <div class="card-body">
                        <h5 class="card-title">realisateur <?php echo htmlspecialchars($realisateur->nom); ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
