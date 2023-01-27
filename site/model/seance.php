<?php

require_once('pdo/seancePDO.php');

class Seance
{
    public int $id_seance;
    public Piscine $piscine;
    public Activite $activite;
    public string $dateheure;
    public string $professeur;
    public int $capacite;
    public int $actif;

    public function __construct(
        Piscine $piscine,
        Activite $activite,
        string $dateheure,
        string $professeur,
        int $capacite,
        int $actif,
        int $id_seance = -1
    ) {
        $this->id_seance = $id_seance;
        $this->piscine = $piscine;
        $this->activite = $activite;
        $this->dateheure = $dateheure;
        $this->professeur = $professeur;
        $this->capacite = $capacite;
        $this->actif = $actif;
    }

    public function getId_seance(): int
    {
        return $this->id_seance;
    }

    public function getPiscine(): Piscine
    {
        return $this->piscine;
    }

    public function getActivite(): Activite
    {
        return $this->activite;
    }

    public function getDateheure(): string
    {
        return $this->dateheure;
    }

    public function getProfesseur(): string
    {
        return $this->professeur;
    }

    public function getCapacite(): int
    {
        return $this->capacite;
    }

    public function getActif(): int
    {
        return $this->actif;
    }

    public function getOccupation(): int
    {
        $seancePDO = new SeancePDO();
        $seancePDO->connection = new DBConnection();
        return $seancePDO->getOccupation($this);
    }

    public function alreadyReserved(Code $code): bool
    {
        $seancePDO = new SeancePDO();
        $seancePDO->connection = new DBConnection();
        return $seancePDO->alreadyReserved($code, $this);
    }
}
