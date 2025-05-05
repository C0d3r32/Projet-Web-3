<?php
namespace entities;
class Episode {
    private string $titre;
    /** @var Realisateur[] */
    private array $realisateurs;
    private string $synopsis;
    private int $duree;
    private int $id;

    public function __construct(string $titre, string $synopsis, int $duree, int $id) {
        $this->titre = $titre;
        $this->synopsis = $synopsis;
        $this->duree = $duree;
        $this->realisateurs = [];
        $this->id = $id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    
    public function getId() : int {
        return $this->id;
    }

    public function addRealisateur(Realisateur $realisateur): void {
        $this->realisateurs[] = $realisateur;
    }

    /**
     * @return Realisateur[]
     */
    public function getRealisateurs(): array {
        return $this->realisateurs;
    }
    
    public function getSynopsis(): string {
        return $this->synopsis;
    }
    
    public function setSynopsis(string $synopsis): void {
        $this->synopsis = $synopsis;
    }
    
    public function getDuree(): int {
        return $this->duree;
    }
    
    public function setDuree(int $duree): void {
        $this->duree = $duree;
    }
}
