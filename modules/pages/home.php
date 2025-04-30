<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "modules/classes/Autoloader.php" ;
Autoloader::register();

$logger = new logger\Logger() ;

if (isset($_POST['username']) and isset($_POST['password'])){
    $response = $logger->log(trim($_POST['username']), $_POST['password']) ;
    if ($response['granted']){
        $nick = $response['nick'] ;
    }
}
?>

<?php include "modules/pages/elements/header.php" ?>

<div id="main-content">
    <h1> Bienvenue sur CinéList</h1>
</div>

<?php include "modules/pages/elements/footer.php" ?>