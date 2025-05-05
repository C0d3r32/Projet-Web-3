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


    // creation d'une serie
    public function createSerie($titre, $id, $saisons=null, $tags=null){
        $query = 'INSERT INTO serie(id,titre) VALUES (:id,:titre)';
        $param = [
            'id' => $id,
            'titre'=> $titre
        ];
        return $this->exec($query,$param,null);
    }
    // creation d'un acteur 
    public function createActeur($id, $nom, $photo){
        $query = 'INSERT INTO acteur(id,nom,photo) VALUES (:id,:nom,:photo)';
        $param = [
            'id' => $id,
            'nom'=> $nom,
            'photo' =>$photo
        ];
        return $this->exec($query,$param,null);
    }
    // creation d'un realisateur 
    public function createRealisateur($id, $nom, $photo){
        $query = 'INSERT INTO realisateur(id,nom,photo) VALUES (:id,:nom,:photo)';
        $param = [
            'id' => $id,
            'nom'=> $nom,
            'photo' =>$photo
        ];
        return $this->exec($query,$param,null);
    }
    // creation d'une saison 
    public function createSaison($id, $numero, $affiche ,$id_serie){
        $query = 'INSERT INTO saison(id,numero,affiche,id_serie) VALUES (:id,:numero,:affiche,:id_serie)';
        $param = [
            'id' => $id,
            'numero'=> $numero,
            'affiche' =>$affiche,
            'id_serie' =>$id_serie
        ];
        return $this->exec($query,$param,null);
    }
    // creation d'un episode 
    public function createEpisode($id, $numero, $titre ,$synopsis ,$duree ,$id_saison){
        $query = 'INSERT INTO episode(id, numero, titre ,synopsis ,duree ,id_saison) VALUES (:id,:numero,:titre ,:synopsis ,:duree ,:id_saison)';
        $param = [
            'id' => $id,
            'numero'=> $numero,
            'titre' =>$titre,
            'synopsis' =>$synopsis,
            'duree' => $duree,
            'id_saison' =>$id_saison
        ];
        return $this->exec($query,$param,null);
    }
    // creation d'un tag
    public function createTag($id, $nom){
        $query = 'INSERT INTO tag(id,nom) VALUES (:id,:nom)';
        $param = [
            'id' => $id,
            'nom'=> $nom
        ];
        return $this->exec($query,$param,null);
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
        $realisateursData = $this->exec("SELECT * FROM episode_realisateur WHERE id_episode = ?", [$episode->getId()]); 
        $allRealisateurs = $this->getAllRealisateurs();
    
        foreach ($realisateursData as $relation) {
            foreach ($allRealisateurs as $realisateur) {
                if ($relation->id_realisateur == $realisateur->id) {
                    $episode->addRealisateur(new Realisateur($realisateur->nom, $realisateur->photo, $realisateur->id));
                }
            }
        }
    }
    
    
    public function getAllSaisonActeurs(){
        return $this->exec("SELECT * FROM saison_acteur",null,null);
    }
    public function getSaison($id, $numero, $affiche){
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
                $serie->addSaison($this->getSaison($saison->id, $saison->numero, $saison->affiche)); 
            }
        }
    }

    public function getSeries(){
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
            "SELECT * FROM saison",
            null,
            null
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

    public function deleteTag($tag){
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

    // delete realisateur 
    public function deleteRealisateur($realisateur) {
        $this->exec("DELETE FROM realisateur WHERE id = ?", [$realisateur->getId()]);
        unset($realisateur);
    }
    // delete episode 
    public function deleteEpisode($episode) {
        $this->exec("DELETE FROM episode WHERE id = ?", [$episode->getId()]);
        unset($episode);
    }
    // delete saison
    public function deleteSaison($saison) {
        $this->exec("DELETE FROM saison WHERE id = ?", [$saison->getId()]);
        unset($saison);
    }

}