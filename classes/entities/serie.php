<?php
namespace entities;
class Serie {
    private string $titre;
    /** @var Tag[] */
    private array $tags;
    /** @var Saison[] */
    private array $saisons;
    private $id;

    public function __construct(string $titre) {
        $this->titre = $titre;
        $this->tags = [];
        $this->saisons = [];
        $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function addTag(Tag $tag): void {
        foreach ($this->tags as $etag) {
            if ($tag->getName() === $etag->getName()) {
                return;
            }
        }
        $this->tags[] = $tag;
    }

    public function setId($number) {
        $this->id = $number;
    }

    public function getId() {
        return $this->id;
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

    public function __TabToString(): array {
        $toReturn = [
            "titre"   => $this->titre,
            "tags"    => [],
            "saisons" => ""
        ];

        foreach ($this->tags as $tag) {
            array_push($toReturn["tags"], $tag->getName()); 
        }
        $s = 0;
        foreach ($this->saisons as $saison) {
            $s += 1;  
        }
        $toReturn["saisons"] = (string)$s;

        return $toReturn;
    }
}
