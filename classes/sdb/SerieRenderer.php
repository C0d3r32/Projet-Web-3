<?php

namespace sdb;

use entities\Serie;
use sdb\SerieDB;

class SerieRenderer {
    private static function getCard(Serie $serie) {
        ob_start();
        ?>
        <h1><?= htmlspecialchars($serie->getTitre()) ?></h1>
        <div class="container mt-5">
            <h1>Liste des saisons</h1>
            <div class="row">
                <?php foreach ($serie->getSaisons() as $saison): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars($saison->getAffiche()); ?>" 
                                class="card-img-top" 
                                alt="Affiche saison <?= htmlspecialchars($saison->getNumero()); ?>">
                            <div class="card-body">
                                <h5 class="card-title">Saison <?= htmlspecialchars($saison->getNumero()); ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    public static function renderSeries(SerieDB $serieDB) {
        $series = $serieDB->getSeries();

        $html = "";
        foreach($series as $serie){
            $html .= self::getCard($serie);
        }

        return $html;
    }
}