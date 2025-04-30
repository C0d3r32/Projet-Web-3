<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once "../config.php";
require ".." . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'autoLoader.php';
Autoloader::register(); 

//$sdb = new \sdb\SerieDB();
//$data = $sdb->getAllSeries(); // Or, if not ready:
$data = [];
ob_start(); ?>

<div class="title">SERIES</div>
<section class="series-list">
    <?php foreach ($data as $d): ?>
        <?= $d->getHTML(); ?>
    <?php endforeach; ?>
</section>

<?php $content = ob_get_clean();
Template::render($content);
?>
