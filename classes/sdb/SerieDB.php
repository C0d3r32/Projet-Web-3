<?php
namespace sdb ;

use entities\Acteur;
use entities\Tag;
use entities\Serie;
use entities\Saison;
use entities\Episode;
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
            "SELECT * FROM serie ORDER BY name",
            null,
            null);
    }
    public function createSerie($name, $saisons=null, $tags=null){
        $serie = new Serie($name);

        if ($tags){
            foreach ($tags as $tag){
                $serie->addTag($tag);
            }
        }
        if ($saisons){

        }
    }
    
    public function createTag($name) : Tag {
        return new Tag($name);
    }

    public function getAllActeur(){
        return $this->exec(
            "SELECT * FROM acteur",
            null,
            null);
    }

    public function createAllActeur() : array {
        $toReturn = [];
        $actors = $this->getAllActeur();
        foreach($actors as $actor) {
            $toReturn[$actor->nom] = new Acteur($actor->nom, $actor->photo);
        }
        return $toReturn;
    }
}