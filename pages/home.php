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
$data = $sdb->getSeries();
$result = []; 
foreach ($data as $serie) {
    $serieArray = $serie->__TabToString(); 
    $serieString = json_encode($serieArray); 
    $result[$serieArray['titre']] = $serieString; 
}
$jsonData = json_encode($result);

ob_start();
?>

<div class="title"><h1>Liste des séries</h1>
<p>Retrouvez vos séries juste ici!</p></div>

<main id="seriesContainer"><div id="serie-list"></div></main>
<script>
    const seriesData = <?= $jsonData; ?>
</script>
<script src="../js/showSeries.js"></script>

<?php 
$content = ob_get_clean();
Template::render($content);
?>