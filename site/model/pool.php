<?php

class Pool
{
    private int $id_pool;
    private string $name;
    private string $address;
    private int $active;
    private string $picture;
    private string $map;
    private string $description;

    public function __construct(
        string $name,
        string $address,
        int $active,
        string $picture,
        string $map,
        string $description,
        int $id_pool = -1
    ) {
        $this->id_pool = $id_pool;
        $this->name = $name;
        $this->address = $address;
        $this->active = $active;
        $this->picture = $picture;
        $this->map = $map;
        $this->description = $description;
    }

    public function getIdPool(): int
    {
        return $this->id_pool;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function getMap(): string
    {
        return $this->map;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
}
