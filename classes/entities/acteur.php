<?php
namespace entities;
class Acteur {
    private string $nom;
    private string $photo;
    private int $id;

    public function __construct(string $nom, string $photo, int $id) {
        $this->nom = $nom;
        $this->photo = $photo;
        $this->id = $id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
    
    public function getId() : int {
        return $this->id;
    }

    public function getPhoto(): string {
        return $this->photo;
    }

    public function setPhoto(string $photo): void {
        $this->photo = $photo;
    }
}
