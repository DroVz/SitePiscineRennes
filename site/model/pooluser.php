<?php

class Pooluser
{
    private int $id_user;
    private string $login;
    private string $pwd;
    private string $name;

    public function __construct(string $login, string $pwd, string $name, int $id_user = -1)
    {
        $this->id_user = $id_user;
        $this->login = $login;
        $this->pwd = $pwd;
        $this->name = $name;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPwd(): string
    {
        return $this->pwd;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
