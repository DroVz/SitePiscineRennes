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

    /**
     * @param Activity $activity 
     * @return self
     */
    public function setActivity(Activity $activity): self
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @param Situation $situation 
     * @return self
     */
    public function setSituation(Situation $situation): self
    {
        $this->situation = $situation;
        return $this;
    }

    /**
     * @param int $nb_people 
     * @return self
     */
    public function setNb_people(int $nb_people): self
    {
        $this->nb_people = $nb_people;
        return $this;
    }

    /**
     * @param int $validity 
     * @return self
     */
    public function setValidity(int $validity): self
    {
        $this->validity = $validity;
        return $this;
    }

    /**
     * @param float $price 
     * @return self
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param int $active 
     * @return self
     */
    public function setActive(int $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @param int $id_offer 
     * @return self
     */
    public function setId_offer(int $id_offer): self
    {
        $this->id_offer = $id_offer;
        return $this;
    }
}
