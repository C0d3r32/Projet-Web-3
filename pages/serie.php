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
$data = $sdb->getAllSeries(); 

var_dump($data); 

$jsonData = json_encode($data);

ob_start();
?>

<main id="seriesContainer">
    <div id="serie-list">
        <?= SerieRenderer::renderSeries($sdb); ?>
    </div>
</main>

<?php 
$content = ob_get_clean();
Template::render($content);
?>