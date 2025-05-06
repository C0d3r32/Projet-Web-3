<?php

namespace sdb;

use entities\Serie;
use sdb\SerieDB;

class SerieRenderer {
    public static function renderSerie(Serie $serie) {
        ob_start();
        ?>
        <div class="serie-details">
        <h1 class="serie-title"><?= htmlspecialchars($serie->getTitre()) ?></h1>
        <div class="serie-tags">
            <strong>Tags:</strong> <?= implode(", ", array_map(function($tag) {
                return htmlspecialchars($tag->getName());
            }, $serie->getTags())) ?>
        </div>
        <div class="container mt-5">
            <h2>Liste des saisons</h2>
            <div class="row">
                <?php foreach ($serie->getSaisons() as $saison): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars($saison->getAffiche()); ?>" 
                                class="card-img-top" 
                                alt="Affiche saison <?= htmlspecialchars($saison->getNumero()); ?>" 
                                style="object-fit: cover; height: 200px; width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">Saison <?= htmlspecialchars($saison->getNumero()); ?></h5>
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