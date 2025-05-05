<?php
// require_once('./classes/pdo_wrapper/pdoWrapper.php');
require_once(dirname(__FILE__, 1) . '/classes/pdo_wrapper/pdoWrapper.php');

use pdo_wrapper\PdoWrapper;

$pdoWrapper = new PdoWrapper("seriedb", "127.0.0.1", "3306", "root", "");

if ($pdoWrapper) {
    // connexion reussi
     // echo " yess sir " ;   
} else {
    die("Erreur de connexion à la base de données.");
}
