<?php
class Serie {
    private string $titre;
    /** @var Tag[] */
    private array $tags;
    /** @var Saison[] */
    private array $saisons;

    public function __construct(string $titre) {
        $this->titre = $titre;
        $this->tags = [];
        $this->saisons = [];
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function addTag(Tag $tag): void {
        $this->tags[] = $tag;
    }

    /**
     * @return Tag[]
     */
    public function getTags(): array {
        return $this->tags;
    }

    public function addSaison(Saison $saison): void {
        $this->saisons[] = $saison;
    }

    /**
     * @return Saison[]
     */
    public function getSaisons(): array {
        return $this->saisons;
    }
}
