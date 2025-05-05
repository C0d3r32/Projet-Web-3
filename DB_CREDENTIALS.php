<?php
$GLOBALS['db_name'] ='nboubeza' ;
$GLOBALS['db_host'] ='192.168.22.48';
$GLOBALS['db_port'] ='3306' ;
$GLOBALS['db_user'] = 'nboubeza' ;
$GLOBALS['db_pwd'] ='22072003' ;

try {
    $dsn = 'mysql:dbname=' . $GLOBALS['db_name'] . ';host=' . $GLOBALS['db_host'] . ';port=' . $GLOBALS['db_port'];
    $pdo = new PDO($dsn, $GLOBALS['db_user'], $GLOBALS['db_pwd']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>