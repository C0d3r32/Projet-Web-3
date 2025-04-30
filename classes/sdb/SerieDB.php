<?php
namespace sdb ;

use \pdo_wrapper\pdoWrapper ;

include __DIR__ . "../../../DB_CREDENTIALS.php";

class SerieDB extends PdoWrapper {
    public const UPLOAD_DIR = "uploads/";

    public function __construct(){
        parent::__construct(
            $GLOBALS['db_name'],
            $GLOBALS['db_host'],
            $GLOBALS['db_port'],
            $GLOBALS['db_user'],
            $GLOBALS['db_pwd']) ;
    }

    public function getAllSeries(){
        return $this->exec(
            "SELECT * FROM series ORDER BY name",
            null,
            'sdb\SerieRenderer');
    }

    public function createSerie($name, $description=null, $imgFile=null){

        $name = htmlspecialchars($name) ;
        $description = htmlspecialchars($description) ;

        $imgName = null ;
        if($imgFile != null){
            $tmpName = $imgFile['tmp_name'] ;
            $imgName = $imgFile['name'] ;
            $imgName = urlencode(htmlspecialchars($imgName)) ;

            $dirname = $GLOBALS['PHP_DIR'].self::UPLOAD_DIR ;
            if(!is_dir($dirname)) mkdir($dirname) ;
            $uploaded = move_uploaded_file($tmpName, $dirname.$imgName) ;
            if (!$uploaded) die("FILE NOT UPLOADED") ;
        }else echo "NO IMAGE!" ;

        $query = 'INSERT INTO series(name, description, image) VALUES (:name, :description, :image)';
        $params=[
            'name' => htmlspecialchars($name),
            'description' => htmlspecialchars($description),
            'image' => $imgName
        ] ;
        return $this->exec($query, $params) ;
    }
}