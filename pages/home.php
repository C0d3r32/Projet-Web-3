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
$data = [];//[$serie1->__TabToString(), $serie2->__TabToString()];
$jsonData = json_encode($data);


echo var_dump($sdb->getSeries());
ob_start();
?>

<div class="title"><h1>Liste des séries</h1>
<p>Retrouvez vos séries juste ici!</p></div>

<main id="seriesContainer"><div id="serie-list"></div></main>


<?php $content = ob_get_clean();
Template::render($content);
?>