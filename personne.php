<?php

class Personne {
    private string $nom;
    private string $photo;

    public function __construct(string $nom, string $photo) {
        $this->nom = $nom;
        $this->photo = $photo;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getPhoto(): string {
        return $this->photo;
    }

    public function setPhoto(string $photo): void {
        $this->photo = $photo;
    }
}
