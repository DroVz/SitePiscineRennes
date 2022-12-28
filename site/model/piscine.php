<?php

class Piscine {
    private int $id_piscine;
    private string $nom;
    private string $adresse;
    private int $actif;
    
    public function __construct(int $id_piscine, string $nom, string $adresse, int $actif) {
        $this->id_piscine = $id_piscine;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->actif = $actif;
    }
    
    public function getId_piscine() : int {
        return $this->id_piscine;
    }

    public function getNom() : string {
        return $this->nom;
    }

    public function getAdresse() : string {
        return $this->adresse;
    }

    public function getActif() : int {
        return $this->actif;
    }
}