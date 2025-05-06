<?php
session_start();

use sdb\SerieDB;

require_once "../config.php";
require ".." . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'autoLoader.php';
Autoloader::register();

if (!isset($_SESSION['nick'])) {
    header("Location: login.php");
    exit;
}

$sdb = new SerieDB(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        echo "No series specified.";
        exit;
    }
    
    $serieId = $_POST['id'];
    
    $serie = $sdb->getSerieById($serieId);
    if (!$serie) {
        echo "Series not found.";
        exit;
    }
    var_dump($serie);

    $sdb->deleteSerie($serie);

    //header("Location: home.php");
    exit;
} else {
    echo "Invalid request method.";
    exit;
}