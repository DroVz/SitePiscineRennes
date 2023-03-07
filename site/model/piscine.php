<?php

class Piscine
{
    private int $id_piscine;
    private string $nom;
    private string $adresse;
    private int $actif;
    private string $image;
    private string $map;
    private string $descriptif;

    public function __construct(
        string $nom,
        string $adresse,
        int $actif,
        string $image,
        string $map,
        string $descriptif,
        int $id_piscine = -1
    ) {
        $this->id_piscine = $id_piscine;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->actif = $actif;
        $this->image = $image;
        $this->map = $map;
        $this->descriptif = $descriptif;
    }

    public function getId_piscine(): int
    {
        return $this->id_piscine;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getActif(): int
    {
        return $this->actif;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getMap(): string
    {
        return $this->map;
    }
    public function getDescriptif(): string
    {
        return $this->descriptif;
    }
}