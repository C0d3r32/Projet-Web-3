<?php

namespace sdb;

use sdb\SerieDB ;

class SerieRenderer
{

    public function getHTML(){ ?>
        <article class="serie neon">
            <h1><?= $this->name ?></h1>
            <div class="serie-content">
                <?php if($this->image != null) : ?>

                <img src="<?= $GLOBALS['DOCUMENT_DIR'] . "../" . \sdb\SerieDB::UPLOAD_DIR . $this->image ?>">

                <?php endif; ?>
                <div class="serie-description">
                    <?= $this->description ?>
                </div>
            </div>
        </article>
    <?php }

}