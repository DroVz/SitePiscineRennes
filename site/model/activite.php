<?php

class Activite {
    private int $id_activite;
    private string $libelle;
    private string $description;
    private int $reservation;
    private int $actif;

    public function __construct(int $id_activite, string $libelle, string $description, int $reservation, int $actif) {
        $this->id_activite = $id_activite;
        $this->libelle = $libelle;
        $this->description = $description;
        $this->reservation = $reservation;
        $this->actif = $actif;
    }

    public function getId_activite() : int {
        return $this->id_activite;
    }

    public function getLibelle() : string {
        return $this->libelle;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getReservation() : int {
        return $this->reservation;
    }

    public function getActif() : int {
        return $this->actif;
    }
}