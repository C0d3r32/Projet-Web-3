<?php
namespace sdb ;

use entities\Acteur;
use entities\Realisateur;
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
    }

    public function getAllEpisodes(){
        return $this->exec("SELECT * FROM episode",null,null);
    }

    public function getAllRealisateurs() {
        return $this->exec("SELECT * FROM realisateur", null, null);
    }
    
    public function getSaisonEpisodes(Saison $saison) {
        $episodes = $this->getAllEpisodes();
        foreach ($episodes as $episode) {
            if ($episode->id_saison == $saison->getId()) {
                $saison->addEpisode(new Episode($episode->titre, $episode->synopsis, $episode->duree, $episode->id));
            }
        }
    }

    public function getEpisodeRealisateurs(Episode $episode) {
        $realisateursData = $this->exec("SELECT * FROM episode_realisateur WHERE id_episode = ?", [$episode->getTitre()]);
        $allRealisateurs = $this->getAllRealisateurs(); // Assuming we have a method that fetches all directors
    
        foreach ($realisateursData as $relation) {
            foreach ($allRealisateurs as $realisateur) {
                if ($relation->id_realisateur == $realisateur->id) {
                    $episode->addRealisateur(new Realisateur($realisateur->nom, $realisateur->photo, $realisateur->id));
                }
            }
        }
    }
    
    
    public function getAllSaisonActeurs(){
        return $this->exec("SELECT * FROM TABLE saison_acteur",null,null);
    }
    public function createSaison($id, $numero, $affiche){
        $saison = new Saison($id, $numero, $affiche);
        $AllSaisonActeurs = $this->getAllSaisonActeurs();
        $acteurSaison = [];
        foreach ($AllSaisonActeurs as $acteur){
            if ($acteur->id_saison == $saison->getId()) {
                $acteurSaison[$acteur->id_acteur] = $acteur->id_acteur;
            }
        }

        $allActeurs = $this->getAllActeur();
        foreach($allActeurs as $acteur){
            if (in_array($acteur->id, $acteurSaison)){
                $saison->addActeur(new Acteur($acteur->nom, $acteur->photo, $acteur->id));
            }
        }
        return $saison;
    }
    
    public function getSerieSaisons(Serie $serie){
        $saisons = $this->getSaisons();
        foreach ($saisons as $saison){
            if ($saison->id_serie == $serie->getId()) {
                $serie->addSaison($this->createSaison($saison->id, $saison->numero, $saison->affiche)); 
            }
        }
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

    public function deleteSerie($serie) {
        $this->exec("DELETE FROM serie WHERE id = ?", [$serie->getId()]);
        unset($serie);
    }
    

    public function getSaisons() {
        return $this->exec(
            "SELECT * FROM TABLE saison",
            null,
            null,
        );
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

    public function deleteTag($tag) {
        $this->exec("DELETE FROM tag WHERE id = ?", [$tag->getId()]);
        unset($tag);
    }
    

    public function getAllActeur(){
        return $this->exec(
            "SELECT * FROM acteur",
            null,
            null);
    }

    public function deleteActeur($acteur) {
        $this->exec("DELETE FROM acteur WHERE id = ?", [$acteur->getId()]);
        unset($acteur);
    }
}