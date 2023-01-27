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
}
