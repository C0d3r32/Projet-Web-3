<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use sdb\SerieDB;
use sdb\SerieRenderer;

session_start();

require_once "../config.php";
require ".." . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'autoLoader.php';
Autoloader::register(); 

$sdb = new SerieDB();
$titre = $_GET['titre'] ?? null;

if ($titre) {
    $allSeries = $sdb->getSeries(); 
    $serie = null;

    foreach ($allSeries as $s) {
        if ($s->getTitre() === $titre) {
            $serie = $s;
            break; 
        }
    }

    if (!$serie) {
        echo "Serie not found.";
        exit;
    }
} else {
    echo "No series specified.";
    exit;
}

ob_start();
?>

<main id="seriesContainer">
    <div id="serie-list">
        <?= SerieRenderer::renderSerie($serie);?>
    </div>
</main>

<?php 
$content = ob_get_clean();
Template::render($content);
?>