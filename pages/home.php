<?php

use sdb\SerieDB;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once "../config.php";
require ".." . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'autoLoader.php';
Autoloader::register(); 


$sdb = new sdb\SerieDB();
$data = $sdb->getAllSeries();
// $tagDrame = new entities\Tag("drame");
// $tags1 = [new entities\Tag("fantaisie"), $tagDrame];
// $tags2 = [new entities\Tag("action"), $tagDrame];
// $saisons1 = [new entities\Saison("GOT1", 1, "Saison 1"),
// new entities\Saison("GOT2", 2, "Saison 2"),
// new entities\Saison("GOT3", 3, "Saison 3"),
// new entities\Saison("GOT4", 4, "Saison 4"),
// new entities\Saison("GOT5", 5, "Saison 5"),
// new entities\Saison("GOT6", 6, "Saison 6"),
// new entities\Saison("GOT7", 7, "Saison 7"),
// new entities\Saison("GOT8", 8, "Saison 8")];
// $saisons2 = [new entities\Saison("V1", 1, "Saison 1"),
// new entities\Saison("V2", 2, "Saison 2"),
// new entities\Saison("V3", 3, "Saison 3"),
// new entities\Saison("V4", 4, "Saison 4"),
// new entities\Saison("V5", 5, "Saison 5"),
// new entities\Saison("V6", 6, "Saison 6"),
// new entities\Saison("V6", 7, "Saison 7"),
// new entities\Saison("V6", 8, "Saison 8")];
// $serie1 = new entities\Serie("Game of Thrones");
// $serie2 = new entities\Serie("Vikings");

// foreach ($tags1 as $tag){
//     $serie1->addTag($tag);
// }
// foreach ($tags2 as $tag){
//     $serie2->addTag($tag);
// }
// foreach ($saisons1 as $saison){
//     $serie1->addSaison($saison);
// }
// foreach ($saisons2 as $saison){
//     $serie2->addSaison($saison);
// }

$data = [];//[$serie1->__TabToString(), $serie2->__TabToString()];
$jsonData = json_encode($data);


echo var_dump($sdb->getSeries());
ob_start();
?>

<div class="title"><h1>Liste des séries</h1>
<p>Retrouvez vos séries juste ici!</p></div>

<main id="seriesContainer"><div id="serie-list"></div></main>
<script>
    const seriesData = <?= $jsonData ;?>
</script>
<script src="../js/showSeries.js"></script>

<?php $content = ob_get_clean();
Template::render($content);
?>
