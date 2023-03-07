<?php

class Situation
{
    private int $id_situation;
    private string $name;
    private int $active;

    public function __construct(string $name, int $active, int $id_situation = -1)
    {
        $this->id_situation = $id_situation;
        $this->name = $name;
        $this->active = $active;
    }

    public function getIdSituation(): int
    {
        return $this->id_situation;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getActive(): int
    {
        return $this->active;
    }
}
