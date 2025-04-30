<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../config.php";

require ".." . DIRECTORY_SEPARATOR . 'classes'. DIRECTORY_SEPARATOR.'autoLoader.php';
Autoloader::register();

?>

<?php include "modules/pages/elements/header.php" ?>

<div id="main-content">
    <b>ADMIN PANEL

</div>

<?php include "modules/pages/elements/footer.php" ?>