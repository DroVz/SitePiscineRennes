<?php

class Activity
{
    private int $id_activity;
    private string $name;
    private string $description;
    private int $booking;
    private int $active;

    public function __construct(string $name, string $description, int $booking, int $active, int $id_activity = -1)
    {
        $this->id_activity = $id_activity;
        $this->name = $name;
        $this->description = $description;
        $this->booking = $booking;
        $this->active = $active;
    }

    public function getIdActivity(): int
    {
        return $this->id_activity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getBooking(): int
    {
        return $this->booking;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    /**
     * @param string $name 
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param int $booking 
     * @return self
     */
    public function setBooking(int $booking): self
    {
        $this->booking = $booking;
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
     * @param int $id_activity 
     * @return self
     */
    public function setId_activity(int $id_activity): self
    {
        $this->id_activity = $id_activity;
        return $this;
    }
}
