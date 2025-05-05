<?php

namespace sdb;

use sdb\SerieDB;

class SerieRenderer {
    private string $name;
    private ?string $image;
    private string $description;

    public function __construct(string $name, ?string $image, string $description) {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
    }

    public function getHTML(){ ?>
        <article class="game neon">
            <h1><?= htmlspecialchars($this->name) ?></h1>
            <div class="game-content">
                <?php if($this->image !== null) : ?>
                    <img src="<?= htmlspecialchars($GLOBALS['DOCUMENT_DIR'] . "../" . SerieDB::UPLOAD_DIR . $this->image) ?>">
                <?php endif; ?>
                <div class="game-description">
                    <?= nl2br(htmlspecialchars($this->description)) ?>
                </div>
            </div>
        </article>
    <?php }
}
