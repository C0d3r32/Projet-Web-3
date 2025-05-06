<?php
session_start();

use sdb\SerieDB;

require_once "../config.php";
require ".." . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'autoLoader.php';
Autoloader::register();

if (!isset($_SESSION['nick'])) {
    header("Location: login.php");
    exit;
}

$sdb = new SerieDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serieId = $_POST['id'];
    $titre = $_POST['titre'];
    $tagsInput = $_POST['tags'];
    $tags = array_filter(array_map('trim', explode(',', $tagsInput)));

    $sdb->exec("UPDATE serie SET titre = :titre WHERE id = :id", [
        'titre' => $titre,
        'id' => $serieId,
    ]);

    $sdb->exec("DELETE FROM serie_tag WHERE id_serie = ?", [$serieId]);
    foreach ($tags as $tagName) {
        $tagId = $sdb->getOrCreateTag($tagName);
        $sdb->exec("INSERT IGNORE INTO serie_tag (id_serie, id_tag) VALUES (?, ?)", [$serieId, $tagId]);
    }

    $seasonIds = $_POST['season_id'];
    $seasonNumbers = $_POST['season_num'];
    $seasonAffiches = $_POST['season_affiche'];

    $episodeIds = $_POST['episode_id'];
    $episodeTitles = $_POST['episode_title'];
    $realisateursList = $_POST['realisateurs'];
    $synopses = $_POST['synopsis'];
    $durations = $_POST['duration'];

    foreach ($seasonIds as $sIndex => $seasonId) {
        $numero = $seasonNumbers[$sIndex];
        $affiche = trim($seasonAffiches[$sIndex]);

        if ($seasonId === 'new') {
            $seasonId = $sdb->insertSaison($numero, $affiche, $serieId);
        } else {
            $sdb->exec("UPDATE saison SET numero = :numero, affiche = :affiche WHERE id = :id", [
                'numero' => $numero,
                'affiche' => $affiche,
                'id' => $seasonId,
            ]);
        }

        foreach ($episodeIds[$sIndex] as $eIndex => $episodeId) {
            $title = $episodeTitles[$sIndex][$eIndex];
            $realisateursRaw = $realisateursList[$sIndex][$eIndex];
            $synopsis = $synopses[$sIndex][$eIndex];
            $duration = $durations[$sIndex][$eIndex];

            if ($episodeId === 'new') {
                $episodeId = $sdb->insertEpisode($eIndex + 1, $title, $synopsis, $duration, $seasonId);
            } else {
                $sdb->exec("UPDATE episode SET titre = :titre, synopsis = :synopsis, duree = :duree WHERE id = :id", [
                    'titre' => $title,
                    'synopsis' => $synopsis,
                    'duree' => $duration,
                    'id' => $episodeId,
                ]);
            }

            $sdb->exec("DELETE FROM episode_realisateur WHERE id_episode = ?", [$episodeId]);

            $realisateurNames = array_filter(array_map('trim', explode(',', $realisateursRaw)));
            foreach ($realisateurNames as $name) {
                $realisateurId = $sdb->getOrCreateRealisateur($name);
                $sdb->exec("INSERT IGNORE INTO episode_realisateur (id_episode, id_realisateur) VALUES (?, ?)", [$episodeId, $realisateurId]);
            }
        }
    }

    header("Location: home.php");
    exit;
} else {
    echo "Invalid request method.";
    exit;
}