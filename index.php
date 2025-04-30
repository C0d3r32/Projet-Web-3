<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_name = "projet" ;
 $db_host = "127.0.0.1" ; 
 $db_port = "3306" ;

$db_user = "root" ; 
$db_pwd = "" ;

try{
    $dsn = 'mysql:dbname=' . $db_name . ';host='. $db_host. ';port=' . $db_port;
    $pdo = new PDO($dsn, $db_user, $db_pwd);
}

catch (\Exception $ex){ ?>
     <div style="color: red">
        <b>!!! ERREUR DE CONNEXION !!!</b><br>
        Code : <? echo $ex->getCode() ?><br>
        Message : <? echo $ex->getMessage() ?>
    </div> <?php
}


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

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CinéList</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="modules/css/style.css">

</head>
<body>

<?php include "modules/pages/elements/header.php" ?>

<div id="main-content">
    <?php
        if (!isset($response)) :
            $logger->generateLoginForm("");
        elseif (!$response['granted']) :
            echo "<div class='magic-card' id='error'>" .$response['error']."</div>" ;
            $logger->generateLoginForm("");
        endif;
    ?>

</div>

<?php include "modules/pages/elements/footer.php" ?>

</body>
</html>
