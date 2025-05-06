<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use sdb\SerieDB;

session_start();

require_once "../config.php";
require ".." . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'autoLoader.php';
Autoloader::register(); 

$sdb = new SerieDB();
$acteurs = $sdb->getAllActeur();

$acteursSimple = array_map(function($acteur) {
    return [
        'nom' => $acteur->nom,
        'photo' => $acteur->photo
    ];
}, $acteurs);

$jsonData = json_encode($acteursSimple);

ob_start();
?>

<div class="title"><h1>Liste des acteurs</h1>
<p>Retrouvez vos acteurs favoris ici!</p></div>

<main id="actorsContainer"></main>

<script>
    const acteursData = <?= $jsonData ?>;
</script>
<script src="../js/showActeurs.js"></script>

<?php
$content = ob_get_clean();
Template::render($content);
?>