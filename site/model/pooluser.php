<?php

class Pooluser
{
    private int $id_user;
    private string $login;
    private string $pwd;

    public function __construct(string $login, string $pwd, int $id_user = -1)
    {
        $this->id_user = $id_user;
        $this->login = $login;
        $this->pwd = $pwd;
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
}
