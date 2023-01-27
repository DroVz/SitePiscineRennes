<?php

class Code {
    private int $id_code;
    private Formule $formule;
    private string $date_generation;
    private string $code;
    private int $entrees_restantes;    
    
    public function __construct(int $id_code, Formule $formule, string $date_generation,
    string $code, int $entrees_restantes) {
        $this->id_code = $id_code; 
        $this->formule = $formule;
        $this->date_generation = $date_generation;
        $this->code = $code;    
        $this->entrees_restantes = $entrees_restantes;
    }

    public function getId_code() : int {
        return $this->id_code;
    }

    public function getFormule() : Formule {
        return $this->formule;
    }

    public function getDate_generation() : string {
        return $this->date_generation;
    }

    public function getCode() : string {
        return $this->code;
    }

    public function getEntrees_restantes() : int {
        return $this->entrees_restantes;
    }
}
<?php

class Code {
    private int $id_code;
    private Formule $formule;
    private string $date_generation;
    private string $code;
    private int $entrees_restantes;    
    
    public function __construct(int $id_code, Formule $formule, string $date_generation,
    string $code, int $entrees_restantes) {
        $this->id_code = $id_code; 
        $this->formule = $formule;
        $this->date_generation = $date_generation;
        $this->code = $code;    
        $this->entrees_restantes = $entrees_restantes;
    }

    public function getId_code() : int {
        return $this->id_code;
    }

    public function getFormule() : Formule {
        return $this->formule;
    }

    public function getDate_generation() : string {
        return $this->date_generation;
    }

    public function getCode() : string {
        return $this->code;
    }

    public function getEntrees_restantes() : int {
        return $this->entrees_restantes;
    }
}