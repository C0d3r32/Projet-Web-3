<?php
namespace entities;
class Episode {
    private string $titre;
    /** @var Personne[] */
    private array $realisateurs;
    private string $synopsis;
    private int $duree;

    public function __construct(string $titre, string $synopsis, int $duree) {
        $this->titre = $titre;
        $this->synopsis = $synopsis;
        $this->duree = $duree;
        $this->realisateurs = [];
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function addRealisateur(Personne $realisateur): void {
        $this->realisateurs[] = $realisateur;
    }

    /**
     * @return Personne[]
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
