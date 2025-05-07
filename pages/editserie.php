<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use sdb\SerieDB;

session_start();

require_once "../config.php";
require ".." . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'autoLoader.php';
Autoloader::register();

if (!isset($_SESSION['nick'])) {
    header("Location: login.php");
    exit;
}

$sdb = new SerieDB();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "No series specified.";
    exit;
}

$serieId = $_GET['id'];
$serie = $sdb->getSerieById($serieId);
if (!$serie) {
    echo "Series not found.";
    exit;
}

function serieToArray($serie) {
    return [
        'id' => $serie->getId(),
        'titre' => $serie->getTitre(),
        'tags' => array_map(fn($tag) => $tag->getName(), $serie->getTags()),
        'saisons' => array_map(function($saison) {
            return [
                'id' => $saison->getId(),
                'numero' => $saison->getNumero(),
                'affiche' => $saison->getAffiche(),
                'episodes' => array_map(function($episode) {
                    return [
                        'id' => $episode->getId(),
                        'titre' => $episode->getTitre(),
                        'realisateurs' => array_map(fn($r) => $r->getNom(), $episode->getRealisateurs()),
                        'synopsis' => $episode->getSynopsis(),
                        'duree' => $episode->getDuree()
                    ];
                }, $saison->getEpisodes())
            ];
        }, $serie->getSaisons())
    ];
}

$serieData = serieToArray($serie);

ob_start();
?>

<head>
    <style>
        body {
            font-family: Lexend, sans-serif;
            margin: 0; padding: 0;
            background: #f8f7f7;
        }
        .section {
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
        }
        img.season-poster {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 10px;
            display: block;
        }
        .btn-danger {
            margin-top: 4px;
        }
    </style>
</head>

<div class="container mt-4">
    <h1>Modifier la série: <?= htmlspecialchars($serieData['titre']) ?></h1>

    <form action="update_serie.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= htmlspecialchars($serieData['id']) ?>">

        <label for="titre" class="form-label">Titre :</label>
        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($serieData['titre']) ?>" required class="form-control">

        <label for="tags" class="form-label mt-3">Tags (séparés par des virgules) :</label>
        <input type="text" id="tags" name="tags" value="<?= htmlspecialchars(implode(', ', $serieData['tags'])) ?>" class="form-control">

        <div class="section mt-4">
            <h2>Saisons</h2>

            <?php foreach ($serieData['saisons'] as $index => $saison): ?>
                <div class="season mb-4">
                    <input type="hidden" name="season_id[]" value="<?= htmlspecialchars($saison['id']) ?>">

                    <label for="season_num_<?= $index ?>" class="form-label">Numéro de saison :</label>
                    <input type="number" id="season_num_<?= $index ?>" name="season_num[]" value="<?= htmlspecialchars($saison['numero']) ?>" required class="form-control">

                    <label class="form-label mt-2">Affiche actuelle :</label>
                    <?php if ($saison['affiche']): ?>
                        <img class="season-poster img-fluid mb-2 rounded" src="<?= htmlspecialchars($saison['affiche']) ?>" alt="Affiche saison <?= htmlspecialchars($saison['numero']) ?>">
                    <?php else: ?>
                        <p>Aucune affiche</p>
                    <?php endif; ?>

                    <label for="season_affiche_<?= $index ?>">URL de l'affiche :</label>
                    <input type="text" id="season_affiche_<?= $index ?>" name="season_affiche[]" value="<?= htmlspecialchars($saison['affiche']) ?>" class="form-control" placeholder="Entrez l'URL de l'affiche">

                    <button type="button" class="btn btn-danger btn-sm delete-season-btn">Supprimer cette saison</button>

                    <h3 class="mt-3">Épisodes</h3>

                    <?php foreach ($saison['episodes'] as $epIndex => $episode): ?>
                        <div class="episode border p-3 rounded mb-3">
                            <input type="hidden" name="episode_id[<?= $index ?>][]" value="<?= htmlspecialchars($episode['id']) ?>">

                            <label for="episode_title_<?= $index . '_' . $epIndex ?>">Titre de l'épisode :</label>
                            <input type="text" id="episode_title_<?= $index . '_' . $epIndex ?>" name="episode_title[<?= $index ?>][]" value="<?= htmlspecialchars($episode['titre']) ?>" required class="form-control mb-2">

                            <label for="realisateurs_<?= $index . '_' . $epIndex ?>">Réalisateurs (séparés par des virgules) :</label>
                            <input type="text" id="realisateurs_<?= $index . '_' . $epIndex ?>" name="realisateurs[<?= $index ?>][]" value="<?= htmlspecialchars(implode(', ', $episode['realisateurs'])) ?>" required class="form-control mb-2">

                            <label for="synopsis_<?= $index . '_' . $epIndex ?>">Synopsis :</label>
                            <textarea id="synopsis_<?= $index . '_' . $epIndex ?>" name="synopsis[<?= $index ?>][]" rows="3" required class="form-control mb-2"><?= htmlspecialchars($episode['synopsis']) ?></textarea>

                            <label for="duration_<?= $index . '_' . $epIndex ?>">Durée :</label>
                            <input type="text" id="duration_<?= $index . '_' . $epIndex ?>" name="duration[<?= $index ?>][]" value="<?= htmlspecialchars($episode['duree']) ?>" required class="form-control">

                            <button type="button" class="btn btn-danger btn-sm delete-episode-btn mt-2">Supprimer cet épisode</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <button type="button" id="add-season-btn" class="btn btn-success mb-4 mt-3">Ajouter une saison</button>
        </div>

        <input type="hidden" id="season_id_to_delete" name="season_id_to_delete" value="">
        <input type="hidden" id="episode_id_to_delete" name="episode_id_to_delete" value="">

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour la série</button>
    </form>
</div>

<template id="season-template">
  <div class="season mb-4">
    <input type="hidden" name="season_id[]" value="new">

    <label>Numéro de saison :</label>
    <input type="number" name="season_num[]" required class="form-control">

    <label>URL de l'affiche :</label>
    <input type="text" name="season_affiche[]" class="form-control mb-3" placeholder="Entrez l'URL de l'affiche">

    <button type="button" class="btn btn-danger btn-sm delete-season-btn mb-3">Supprimer cette saison</button>

    <h3>Épisodes</h3>
    <div class="episodes-container"></div>

    <button type="button" class="btn btn-secondary add-episode-btn mb-3">Ajouter un épisode</button>
  </div>
</template>

<template id="episode-template">
  <div class="episode border p-3 rounded mb-3">
    <input type="hidden" name="episode_id[new][]" value="new">

    <label>Titre de l'épisode :</label>
    <input type="text" name="episode_title[new][]" required class="form-control mb-2">

    <label>Réalisateurs (séparés par des virgules) :</label>
    <input type="text" name="realisateurs[new][]" required class="form-control mb-2">

    <label>Synopsis :</label>
    <textarea name="synopsis[new][]" rows="3" required class="form-control mb-2"></textarea>

    <label>Durée :</label>
    <input type="text" name="duration[new][]" required class="form-control">

    <button type="button" class="btn btn-danger btn-sm delete-episode-btn mt-2">Supprimer cet épisode</button>
  </div>
</template>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const addSeasonBtn = document.getElementById('add-season-btn');
  const seasonsContainer = document.querySelector('.section');
  const seasonTemplate = document.getElementById('season-template').content;
  const episodeTemplate = document.getElementById('episode-template').content;

  let seasonIdsToDelete = [];
  let episodeIdsToDelete = [];

  function updateDeleteInputs() {
    document.getElementById('season_id_to_delete').value = seasonIdsToDelete.join(',');
    document.getElementById('episode_id_to_delete').value = episodeIdsToDelete.join(',');
  }

  addSeasonBtn.addEventListener('click', () => {
    const newSeason = document.importNode(seasonTemplate, true);

    const addEpisodeBtn = newSeason.querySelector('.add-episode-btn');
    const episodesContainer = newSeason.querySelector('.episodes-container');

    addEpisodeBtn.addEventListener('click', () => {
      const newEpisode = document.importNode(episodeTemplate, true);
      attachEpisodeDeleteHandler(newEpisode);
      episodesContainer.appendChild(newEpisode);
    });

    attachSeasonDeleteHandler(newSeason);

    seasonsContainer.appendChild(newSeason);
  });

  document.querySelectorAll('.season').forEach(season => {
    attachSeasonDeleteHandler(season);
    const addEpisodeBtn = season.querySelector('.add-episode-btn');
    if (addEpisodeBtn) {
      const episodesContainer = season.querySelector('.episodes-container');
      addEpisodeBtn.addEventListener('click', () => {
        const newEpisode = document.importNode(episodeTemplate, true);
        attachEpisodeDeleteHandler(newEpisode);
        episodesContainer.appendChild(newEpisode);
      });
    }
    season.querySelectorAll('.episode').forEach(episode => {
      attachEpisodeDeleteHandler(episode);
    });
  });

  function attachSeasonDeleteHandler(seasonElement) {
    const deleteButton = seasonElement.querySelector('.delete-season-btn');
    deleteButton.addEventListener('click', () => {
      if (confirm('Voulez-vous vraiment supprimer cette saison ?')) {
        const seasonIdInput = seasonElement.querySelector('input[name="season_id[]"]');
        if(seasonIdInput && seasonIdInput.value !== 'new') {
          seasonIdsToDelete.push(seasonIdInput.value);
          updateDeleteInputs();
        }
        seasonElement.remove();
      }
    });
  }

  function attachEpisodeDeleteHandler(episodeElement) {
    const deleteButton = episodeElement.querySelector('.delete-episode-btn');
    deleteButton.addEventListener('click', () => {
      if (confirm('Voulez-vous vraiment supprimer cet épisode ?')) {
        const episodeIdInput = episodeElement.querySelector('input[name^="episode_id"]');
        if(episodeIdInput && episodeIdInput.value !== 'new') {
          episodeIdsToDelete.push(episodeIdInput.value);
          updateDeleteInputs();
        }
        episodeElement.remove();
      }
    });
  }
});
</script>

<?php
$content = ob_get_clean();
Template::render($content);
?>
