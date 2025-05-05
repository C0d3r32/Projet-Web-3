<?php
namespace entities;
class Saison {
    private int $id;
    private int $numero;
    private string $affiche;
    /** @var Episode[] */
    private array $episodes;
    /** @var Acteur[] */
    private array $casting;

    public function __construct(int $id, int $numero, string $affiche) {
        $this->id= $id;
        $this->numero = $numero;
        $this->affiche = $affiche;
        $this->episodes = [];
        $this->casting = [];
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
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

    public function addActeur(Acteur $acteur): void {
        $this->casting[] = $acteur;
    }

    /**
     * @return Acteur[]
     */
    public function getCasting(): array {
        return $this->casting;
    }
}
