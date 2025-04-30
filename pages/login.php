<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../config.php";

session_start();

require ".." . DIRECTORY_SEPARATOR . 'classes'. DIRECTORY_SEPARATOR.'autoLoader.php';
Autoloader::register();

$logger = new logger\Logger() ;

if (isset($_POST['username']) and isset($_POST['password'])){
    $response = $logger->log(trim($_POST['username']), $_POST['password']) ;
    if ($response['granted']){
        $_SESSION['nick'] = $response['nick'];
        $nick = $response['nick'] ;
        header("Location: home.php");
        exit();
    }
}

ob_start() ?>

<div id="main-content" style="border: solid 1px black">
    <?php
        if (isset($_SESSION['nick'])) :
            header("Location: home.php");
            exit();
        elseif (!isset($response)) :
            $logger->generateLoginForm("");
        elseif (!$response['granted']) :
            echo "<div class='magic-card' id='error'>" .$response['error']."</div>" ;
            $logger->generateLoginForm("");
        endif;
    ?>

</div>

<?php $content=ob_get_clean() ?>

<?php Template::render($content) ?>