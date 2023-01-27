<?php

class Situation {
    private int $id_situation;
    private string $libelle;
    private int $actif;
    
    public function __construct(int $id_situation, string $libelle, int $actif) {
        $this->id_situation = $id_situation;
        $this->libelle = $libelle;
        $this->actif = $actif;
    }

    public function getId_situation() : int {
        return $this->id_situation;
    }

    public function getLibelle() : string {
        return $this->libelle;
    }

    public function getActif() : int {
        return $this->actif;
    }
}