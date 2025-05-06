<?php
require_once(dirname(__FILE__, 1) . '/classes/pdo_wrapper/pdoWrapper.php');

use pdo_wrapper\PdoWrapper;

$pdoWrapper = new PdoWrapper($GLOBALS['db_name'], $GLOBALS['db_host'], $GLOBALS['db_port'], $GLOBALS['db_user'], $GLOBALS['db_pwd']);


if ($pdoWrapper) {
    // connexion reussi
     // echo " yess sir " ;   
} else {
    die("Erreur de connexion à la base de données.");
}
