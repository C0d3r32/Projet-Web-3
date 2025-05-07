<?php
namespace sdb ;

use entities\Acteur;
use entities\Realisateur;
use entities\Tag;
use entities\Serie;
use entities\Saison;
use entities\Episode;
use \pdo_wrapper\pdoWrapper ;

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

    public function createSerie($titre, $id, $saisons=null, $tags=null){
        $query = 'INSERT INTO serie(id,titre) VALUES (:id,:titre)';
        $param = [
            'id' => $id,
            'titre'=> $titre
        ];
        return $this->exec($query,$param,null);
    }

    public function createActeur($id, $nom, $photo){
        $query = 'INSERT INTO acteur(id,nom,photo) VALUES (:id,:nom,:photo)';
        $param = [
            'id' => $id,
            'nom'=> $nom,
            'photo' =>$photo
        ];
        return $this->exec($query,$param,null);
    }

    public function createRealisateur($id, $nom, $photo){
        $query = 'INSERT INTO realisateur(id,nom,photo) VALUES (:id,:nom,:photo)';
        $param = [
            'id' => $id,
            'nom'=> $nom,
            'photo' =>$photo
        ];
        return $this->exec($query,$param,null);
    }

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

    public function getOrCreateTag($tagName) {
        $tag = $this->exec("SELECT * FROM tag WHERE nom = ?", [$tagName]);
        if (count($tag) > 0) {
            return $tag[0]->id;
        }
    
        $newTagId = uniqid();
        $this->createTag($newTagId, $tagName);
        return $newTagId;
    }
    
    public function getOrCreateRealisateur($realisateurName) {
        $realisateur = $this->exec("SELECT * FROM realisateur WHERE nom = ?", [$realisateurName]);
        if (count($realisateur) > 0) {
            return $realisateur[0]->id;
        }
    
        $newRealisateurId = uniqid(); 
        $this->createRealisateur($newRealisateurId, $realisateurName, ''); 
        return $newRealisateurId;
    }
    
    public function insertSaison($numero, $affiche, $id_serie) {
        $newId = uniqid();
        $query = 'INSERT INTO saison(id, numero, affiche, id_serie) VALUES (:id, :numero, :affiche, :id_serie)';
        $param = [
            'id' => $newId,
            'numero' => $numero,
            'affiche' => $affiche,
            'id_serie' => $id_serie
        ];
        $this->exec($query, $param, null);
        return $newId;
    }
    
    public function insertEpisode($numero, $titre, $synopsis, $duree, $id_saison) {
        $newId = uniqid();
        $query = 'INSERT INTO episode(id, numero, titre, synopsis, duree, id_saison) VALUES (:id, :numero, :titre, :synopsis, :duree, :id_saison)';
        $param = [
            'id' => $newId,
            'numero' => $numero,
            'titre' => $titre,
            'synopsis' => $synopsis,
            'duree' => $duree,
            'id_saison' => $id_saison
        ];
        $this->exec($query, $param, null);
        return $newId;
    }
    public function deleteSerie($serie) {
        $id = $serie->getId();
        if (!$id) {
            throw new \Exception('Serie ID missing, cannot delete.');
        }
    
        try {
            $saisons = $this->getSaisonsBySerieId($id);
    
            foreach ($saisons as $saison) {
                $this->exec(
                    "DELETE FROM episode_realisateur WHERE id_episode IN 
                     (SELECT id FROM episode WHERE id_saison = ?)",
                    [$saison->id]
                );
    
                $this->exec("DELETE FROM episode WHERE id_saison = ?", [$saison->id]);
            }
    
            $this->exec("DELETE FROM saison WHERE id_serie = ?", [$id]);
            $this->exec("DELETE FROM serie_tag WHERE id_serie = ?", [$id]);
    
            $result = $this->exec("DELETE FROM serie WHERE id = ?", [$id]);
            if ($result === false) {
                throw new \Exception('Failed to delete serie ID: ' . $id);
            }

            unset($serie);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    

    public function getSaisons() {
        return $this->exec(
            "SELECT * FROM saison",
            null,
            null
        );
    }
    public function getSaisonsBySerieId($serieId) {
        return $this->exec("SELECT * FROM saison WHERE id_serie = ?", [$serieId]);
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

    public function getSerieById($id) {
        $serieData = $this->exec("SELECT * FROM serie WHERE id = ?", [$id]);
        if (count($serieData) === 0) {
            return null;
        }
    
        $serie = new Serie($serieData[0]->titre);
        $serie->setId($serieData[0]->id);
        
        $this->getSerieSaisons($serie);
        $this->getSerieTags($serie);
        
        return $serie;
    }

    public function updateSerie($id, $titre) {
        $query = 'UPDATE serie SET titre = :titre WHERE id = :id';
        $param = [
            'id' => $id,
            'titre' => $titre
        ];
        return $this->exec($query, $param, null);
    }
    
    public function updateSaison($id, $numero, $affiche, $id_serie) {
        $query = 'UPDATE saison SET numero = :numero, affiche = :affiche WHERE id = :id';
        $param = [
            'id' => $id,
            'numero' => $numero,
            'affiche' => $affiche
        ];
        return $this->exec($query, $param, null);
    }
    
    public function updateEpisode($id, $titre, $synopsis, $duree) {
        $query = 'UPDATE episode SET titre = :titre, synopsis = :synopsis, duree = :duree WHERE id = :id';
        $param = [
            'id' => $id,
            'titre' => $titre,
            'synopsis' => $synopsis,
            'duree' => $duree
        ];
        return $this->exec($query, $param, null);
    }
    
    public function linkTagToSerie($serieId, $tagId) {
        $query = 'INSERT IGNORE INTO serie_tag (id_serie, id_tag) VALUES (:id_serie, :id_tag)';
        $param = [
            'id_serie' => $serieId,
            'id_tag' => $tagId
        ];
        return $this->exec($query, $param, null);
    }
    
    public function linkRealisateurToEpisode($episodeId, $realisateurId) {
        $query = 'INSERT IGNORE INTO episode_realisateur (id_episode, id_realisateur) VALUES (:id_episode, :id_realisateur)';
        $param = [
            'id_episode' => $episodeId,
            'id_realisateur' => $realisateurId
        ];
        return $this->exec($query, $param, null);
    }    

    public function deleteActeur($acteur) {
        $this->exec("DELETE FROM acteur WHERE id = ?", [$acteur->getId()]);
        unset($acteur);
    }

    public function deleteRealisateur($realisateur) {
        $this->exec("DELETE FROM realisateur WHERE id = ?", [$realisateur->getId()]);
        unset($realisateur);
    }

    public function deleteEpisode($episode) {
        $this->exec("DELETE FROM episode WHERE id = ?", [$episode->getId()]);
        unset($episode);
    }

    public function deleteSaison($saison) {
        $this->exec("DELETE FROM saison WHERE id = ?", [$saison->getId()]);
        unset($saison);
    }

    
    public function getEpisodesBySaison($id_saison) {
        $query = "SELECT * FROM episode WHERE id_saison = ?";
        $params = [$id_saison];
        $episodesData = $this->exec($query, $params, null);
    
        $episodes = [];
        foreach ($episodesData as $episode) {
            $episodes[] = new Episode($episode->titre, $episode->synopsis, $episode->duree, $episode->id);
        }
    
        return $episodes;
    }
    
    

    


   
    
}