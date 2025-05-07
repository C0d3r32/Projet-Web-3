<?php

use sdb\SaisonRenderer;
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
$titre = $_GET['saison_id'] ?? null;

if ($titre) {
    $allsaisons = $sdb->getSaisons(); 
    $saison = null;

    foreach ($allsaisons as $s) {
        if (strval($s->id) === $titre) {
            $saison = $s;
            break; 
        }
    }

    if (!$saison) {
        echo "Saison not found.";
        exit;
    }
} else {
    echo "No saison specified.";
    exit;
}

ob_start();
?>

<main id="seriesContainer">
    <div id="serie-list">
        <?= SaisonRenderer::renderSaison($sdb->getSaison($saison->id, $saison->numero,$saison->affiche));?>
    </div>
</main>


<?php 
$content = ob_get_clean();
Template::render($content);
?>