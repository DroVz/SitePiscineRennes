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
     * @param int $active 
     * @return self
     */
    public function setActive(int $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @param int $id_situation 
     * @return self
     */
    public function setId_situation(int $id_situation): self
    {
        $this->id_situation = $id_situation;
        return $this;
    }
}
