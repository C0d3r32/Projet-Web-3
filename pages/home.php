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
    $serieArray['id'] = $serie->getId();
    $serieString = json_encode($serieArray); 
    $result[$serieArray['titre']] = $serieString; 
}
$jsonData = json_encode($result);

$allTags = $sdb->getAllTags();
$tagsList = [];
foreach ($allTags as $tag) {
    $tagsList[] = $tag->nom;
}
$tagsJSON = json_encode($tagsList);

ob_start();
?>

<div class="title">
    <h1>Liste des séries</h1>
    <p>Retrouvez toutes vos séries juste ici!</p>
</div>

<div id="tagSidebar">
    <h3>Filtres</h3>
</div>

<main id="seriesContainer">
    <div id="serie-list"></div>
</main>

<script>
    const seriesData = <?= $jsonData; ?>;
    const tagsList = <?= $tagsJSON; ?>;
    const isAdmin = <?= isset($_SESSION['nick']) ? 'true' : 'false'; ?>;
</script>
<script src="../js/showSeries.js"></script>

<?php 
$content = ob_get_clean();
Template::render($content);
?>