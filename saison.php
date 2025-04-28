<?php

class Saison {
    private string $titre;
    private int $numero;
    private string $affiche;
    /** @var Episode[] */
    private array $episodes;
    /** @var Personne[] */
    private array $casting;

    public function __construct(string $titre, int $numero, string $affiche) {
        $this->titre = $titre;
        $this->numero = $numero;
        $this->affiche = $affiche;
        $this->episodes = [];
        $this->casting = [];
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function getNumero(): int {
        return $this->numero;
    }

    public function setNumero(int $numero): void {
        $this->numero = $numero;
    }

    public function getAffiche(): string {
        return $this->affiche;
    }

    public function setAffiche(string $affiche): void {
        $this->affiche = $affiche;
    }

    public function addEpisode(Episode $episode): void {
        $this->episodes[] = $episode;
    }

    /**
     * @return Episode[]
     */
    public function getEpisodes(): array {
        return $this->episodes;
    }

    public function addActeur(Personne $acteur): void {
        $this->casting[] = $acteur;
    }

    /**
     * @return Personne[]
     */
    public function getCasting(): array {
        return $this->casting;
    }
}
