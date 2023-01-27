<?php

class Code
{
    private int $id_code;
    private Formule $formule;
    private string $date_generation;
    private string $codeString;
    private int $entrees_restantes;

    public function __construct(
        Formule $formule,
        string $date_generation,
        string $code,
        int $entrees_restantes,
        int $id_code = -1
    ) {
        $this->id_code = $id_code;
        $this->formule = $formule;
        $this->date_generation = $date_generation;
        $this->codeString = $code;
        $this->entrees_restantes = $entrees_restantes;
    }

    public function getId_code(): int
    {
        return $this->id_code;
    }

    public function getFormule(): Formule
    {
        return $this->formule;
    }

    public function getDate_generation(): string
    {
        return $this->date_generation;
    }

    public function getCodeString(): string
    {
        return $this->codeString;
    }

    public function getEntrees_restantes(): int
    {
        return $this->entrees_restantes;
    }
}
