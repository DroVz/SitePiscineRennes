<?php
  require_once('model/piscine.php');
  require_once('pdo/piscinePDO.php');

class PiscineController {

    private PiscinePDO $piscinePDO;
    private array $listPiscine;

    public function __construct()
    {
        $this->piscinePDO->connection = new DBConnection();
        $this->listPiscine = $this->piscinePDO->getPiscines();
    }

    public function getPiscineByName(string $name) : Piscine {
        if(empty($this->listPiscine)) throw new Exception('listPiscine is not defined');
    
        $piscine = array_filter($this->listPiscine, function ($p) use ($name) {
            return $p->getName() === $name;
        });
        if(empty($piscine)) throw new Exception('Piscine not found : '.$name);
    
        return array_pop($piscine);
    }
    
}