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
$realisateurs = $sdb->getAllRealisateurs();

$realisateursSimple = array_map(function($realisateur) {
    return [
        'nom' => $realisateur->nom,
        'photo' => $realisateur->photo
    ];
}, $realisateurs);

$jsonData = json_encode($realisateursSimple);

ob_start();
?>

<div class="title"><h1>Liste des réalisateurs</h1>
<p>Retrouvez vos réalisateurs favoris ici!</p></div>

<main id="actorsContainer"></main>

<script>
    const acteursData = <?= $jsonData ?>;
</script>
<script src="../js/showActeurs.js"></script>

<?php
$content = ob_get_clean();
Template::render($content);
?>