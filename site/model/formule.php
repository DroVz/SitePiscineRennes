<?php

class Formule {
    private int $id_formule;
    private Activite $activite;
    private Situation $situation;
    private int $nb_entrees;
    private int $nb_personnes;
    private int $duree_validite;
    private float $prix;
    private int $actif;

    public function __construct(int $id_formule, Activite $activite, Situation $situation, int $nb_entrees,
    int $nb_personnes, int $duree_validite, float $prix, int $actif) {
        $this->id_formule = $id_formule;
        $this->activite = $activite;
        $this->situation = $situation;
        $this->nb_entrees = $nb_entrees;
        $this->nb_personnes = $nb_personnes;
        $this->duree_validite = $duree_validite;
        $this->prix = $prix;
        $this->actif = $actif;
    }

    public function getId_formule() : int {
        return $this->id_formule;
    }

    public function getActivite() : Activite {
        return $this->activite;
    }

    public function getSituation() : Situation {
        return $this->situation;
    }

    public function getNb_entrees() : int {
        return $this->nb_entrees;
    }

    public function getNb_personnes() : int {
        return $this->nb_personnes;
    }

    public function getDuree_validite() : int {
        return $this->duree_validite;
    }

    public function getPrix() : float {
        return $this->prix;
    }

    public function getActif() : int {
        return $this->actif;
    }
}