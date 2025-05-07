<?php
session_start();

use sdb\SerieDB;
use entities\Saison;

require_once "../config.php";
require ".." . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'autoLoader.php';
Autoloader::register();

if (!isset($_SESSION['nick'])) {
    header("Location: login.php");
    exit;
}

$sdb = new SerieDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("Form submitted. Data: " . print_r($_POST, true));

    try {
        $serieId = $_POST['id'];
        $titre = $_POST['titre'];
        $tagsInput = $_POST['tags'];
        $tags = array_filter(array_map('trim', explode(',', $tagsInput)));

        $sdb->updateSerie($serieId, $titre);

        $sdb->exec("DELETE FROM serie_tag WHERE id_serie = ?", [$serieId]);
        foreach ($tags as $tagName) {
            $tagId = $sdb->getOrCreateTag($tagName);
            $sdb->exec("INSERT IGNORE INTO serie_tag (id_serie, id_tag) VALUES (?, ?)", [$serieId, $tagId]);
        }

        if (!empty($_POST['season_id_to_delete'])) {
            $seasonIdsToDelete = explode(',', $_POST['season_id_to_delete']);
            foreach ($seasonIdsToDelete as $seasonIdToDelete) {
                $seasonIdToDelete = trim($seasonIdToDelete);
                if ($seasonIdToDelete) {
                    $sdb->exec("DELETE FROM saison WHERE id = ?", [$seasonIdToDelete]);
                    error_log("Deleted season ID: $seasonIdToDelete");
                }
            }
        }

        if (!empty($_POST['episode_id_to_delete'])) {
            $episodeIdsToDelete = explode(',', $_POST['episode_id_to_delete']);
            foreach ($episodeIdsToDelete as $episodeIdToDelete) {
                $episodeIdToDelete = trim($episodeIdToDelete);
                if ($episodeIdToDelete) {
                    $sdb->exec("DELETE FROM episode_realisateur WHERE id_episode = ?", [$episodeIdToDelete]);
                    $sdb->exec("DELETE FROM episode WHERE id = ?", [$episodeIdToDelete]);
                    error_log("Deleted episode ID: $episodeIdToDelete");
                }
            }
        }

        $seasonIds = $_POST['season_id'] ?? [];
        $seasonNumbers = $_POST['season_num'] ?? [];
        $seasonAffiches = $_POST['season_affiche'] ?? [];

        $episodeIds = $_POST['episode_id'] ?? [];
        $episodeTitles = $_POST['episode_title'] ?? [];
        $realisateursList = $_POST['realisateurs'] ?? [];
        $synopses = $_POST['synopsis'] ?? [];
        $durations = $_POST['duration'] ?? [];

        foreach ($seasonIds as $sIndex => $seasonId) {
            $numero = $seasonNumbers[$sIndex] ?? null;
            $affiche = trim($seasonAffiches[$sIndex] ?? '');

            if ($seasonId === 'new') {
                $seasonId = $sdb->insertSaison($numero, $affiche, $serieId);
                error_log("New season inserted with ID: $seasonId");
            } else {
                $sdb->updateSaison($seasonId, $numero, $affiche, $serieId);
            }

            if (!isset($episodeIds[$sIndex]) || empty($episodeIds[$sIndex])) {
                error_log("No episode IDs found for season index $sIndex. Skipping.");
                continue;
            }

            foreach ($episodeIds[$sIndex] as $eIndex => $episodeId) {
                $title = $episodeTitles[$sIndex][$eIndex] ?? '';
                $realisateursRaw = $realisateursList[$sIndex][$eIndex] ?? '';
                $synopsis = $synopses[$sIndex][$eIndex] ?? '';
                $duration = $durations[$sIndex][$eIndex] ?? '';

                if ($episodeId === 'new') {
                    try {
                        error_log("Inserting new episode: numero=" . ($eIndex + 1) . ", titre=" . json_encode($title) . ", synopsis=" . json_encode($synopsis) . ", duree=" . json_encode($duration) . ", id_saison=" . $seasonId);
                        $episodeId = $sdb->insertEpisode($eIndex + 1, $title, $synopsis, $duration, $seasonId);
                        error_log("Inserted episode with ID: $episodeId");
                    } catch (Exception $e) {
                        error_log("Error insertEpisode: " . $e->getMessage());
                        echo "Error inserting episode: " . htmlspecialchars($e->getMessage());
                        exit;
                    }
                } else {
                    $sdb->exec("UPDATE episode SET titre = :titre, synopsis = :synopsis, duree = :duree WHERE id = :id", [
                        'titre' => $title,
                        'synopsis' => $synopsis,
                        'duree' => $duration,
                        'id' => $episodeId,
                    ]);
                    error_log("Updated episode with ID: $episodeId");
                }

                $sdb->exec("DELETE FROM episode_realisateur WHERE id_episode = ?", [$episodeId]);

                $realisateurNames = array_filter(array_map('trim', explode(',', $realisateursRaw)));
                foreach ($realisateurNames as $name) {
                    $realisateurId = $sdb->getOrCreateRealisateur($name);
                    $sdb->exec("INSERT IGNORE INTO episode_realisateur (id_episode, id_realisateur) VALUES (?, ?)", [$episodeId, $realisateurId]);
                    error_log("Linked realisateur ID: $realisateurId to episode ID: $episodeId");
                }
            }
        }

        header("Location: home.php");
        exit;
    } catch (Exception $e) {
        error_log("Error in update_serie.php: " . $e->getMessage());
        echo "Error: " . htmlspecialchars($e->getMessage());
        exit;
    }
} else {
    echo "Invalid request method.";
    exit;
}
