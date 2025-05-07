<?php

namespace sdb;

use entities\Saison;
use entities\Serie;
use sdb\SerieDB;

class SaisonRenderer {
    public static function renderSaison(Saison $saison) {
        ob_start();
        ?>
        <div class="serie-details">
        <h1 class="serie-title">Saison <?= htmlspecialchars($saison->getNumero()) ?></h1>
        <div class="serie-tags">
            <strong>Acteurs:</strong> <?= implode(", ", array_map(function($act) {
                return htmlspecialchars($act->getNom());
            }, $saison->getCasting())) ?>
        </div>
        <div class="container mt-5">
            <h2>Liste des épisodes</h2>
            <div class="row">
                <?php foreach ($saison->getEpisodes() as $episode): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title"><?= htmlspecialchars($episode->getTitre()); ?></h2>
                                <h5 class="card-details">Durée: <?= htmlspecialchars($episode->getDuree())?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
        <?php
        return ob_get_clean();
    }
}