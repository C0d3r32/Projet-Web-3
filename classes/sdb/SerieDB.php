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

    public function __construct() {
        parent::__construct(
            $GLOBALS['db_name'],
            $GLOBALS['db_host'],
            $GLOBALS['db_port'],
            $GLOBALS['db_user'],
            $GLOBALS['db_pwd']) ;
    }

    public function getAllSeries(){
        return $this->exec(
            "SELECT * FROM serie",
            null,
            null);
    }
    public function createSerie($name, $id, $saisons=null, $tags=null){
        $serie = new Serie($name);

        if ($tags){
            foreach ($tags as $tag){
                $serie->addTag($tag);
            }
        }
        if ($saisons){
            foreach ($saisons as $saison){
                $serie->addSaison($saison);
            }
        }
        return $serie;
    }

    public function getSerieTags(Serie $serie) {
        $seriesTags = $this->getAllSeriesTags(); 
        $tagIDs = [];
        foreach ($seriesTags as $relation) {
            if ($relation->id_serie == $serie->getId()) {
                $tagIDs[] = $relation->id_tag;
            }
        }
    
        $allTags = $this->getAllTags(); 
        foreach ($allTags as $tagRow) {
            if (in_array($tagRow->id, $tagIDs)) {
                $tagObject = new Tag($tagRow->nom, $tagRow->id);
                $serie->addTag($tagObject);
            }
        }
    
        return $serie->getTags();
    }
    
    public function getSerieSaisons(Serie $serie){
        return;
    }

    public function createAllSeries(){
        $toReturn = [];
        $series = $this->getAllSeries();
        foreach ($series as $serie){
            $temp = new Serie($serie->titre);
            $temp->setId($serie->id);
            $this->getSerieSaisons($temp);
            $this->getSerieTags($temp);
            $toReturn[$serie->titre] = $temp; 
        }
        return $toReturn;
    }

    public function deleteSerie($serie){
        $serie = null;
    }

    public function getAllTags(){
        return $this->exec(
            "SELECT * FROM tag",
            null,
            null
        );
    }

    public function getAllSeriesTags(){
        return $this->exec(
            "SELECT * FROM serie_tag",
            null,
            null
        );
    }

    public function deleteTag($tag){
        unset($tag);
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

    public function deleteActeur($acteur) {
        unset($acteur);
    }
}