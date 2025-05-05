<?php
// require_once('./classes/pdo_wrapper/pdoWrapper.php');
require_once(dirname(__FILE__, 1) . '/classes/pdo_wrapper/pdoWrapper.php');

use pdo_wrapper\PdoWrapper;

$pdoWrapper = new PdoWrapper("nboubeza", "192.168.22.48", "3306", "nboubeza", "22072003");

if ($pdoWrapper) {
    // connexion reussi
     // echo " yess sir " ;   
} else {
    die("Erreur de connexion à la base de données.");
}
