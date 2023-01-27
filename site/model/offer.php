<?php

class Offer
{
    private int $id_offer;
    private Activity $activity;
    private Situation $situation;
    private int $nb_entries;
    private int $nb_people;
    private int $validity;
    private float $price;
    private int $active;

    public function __construct(
        Activity $activity,
        Situation $situation,
        int $nb_entries,
        int $nb_personnes,
        int $validity,
        float $price,
        int $active,
        int $id_offer = -1
    ) {
        $this->id_offer = $id_offer;
        $this->activity = $activity;
        $this->situation = $situation;
        $this->nb_entries = $nb_entries;
        $this->nb_people = $nb_personnes;
        $this->validity = $validity;
        $this->price = $price;
        $this->active = $active;
    }

    public function getIdOffer(): int
    {
        return $this->id_offer;
    }

    public function getActivity(): Activity
    {
        return $this->activity;
    }

    public function getSituation(): Situation
    {
        return $this->situation;
    }

    public function getNbEntries(): int
    {
        return $this->nb_entries;
    }

    public function getNbPeople(): int
    {
        return $this->nb_people;
    }

    public function getValidity(): int
    {
        return $this->validity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getActive(): int
    {
        return $this->active;
    }
}
