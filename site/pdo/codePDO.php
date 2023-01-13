<?php

require_once('pdo/database.php');
require_once('pdo/formulePDO.php');
require_once('model/code.php');

class CodePDO {
    public DBConnection $connection;

    // Return 1 code from database
    function getCode(int $id_code) : Code
    {
        $MySQLQuery = 'SELECT id_code, id_formule, date_generation, code, entrees_restantes
                        FROM code WHERE id_code = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$id_code]);
        while ($row = $stmt->fetch()) {
            $formulePDO = new FormulePDO();
            $formulePDO->connection = new DBConnection();
            $formule = $formulePDO->getFormule($row["id_formule"]);
            $date_generation = $row['date_generation'];
            $code = $row['code'];
            $entrees_restantes = $row['entrees_restantes'];
            $infosCode = new Code($id_code, $formule, $date_generation, $code, $entrees_restantes);
        }
        return $infosCode;
    }

    // Return all codes from database
    public function getCodes() : array
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM code;');
        $stmt->execute();

        $codes = [];
        while (($row = $stmt->fetch())) {
            $id_code = $row['id_code'];
            $formulePDO = new FormulePDO();
            $formulePDO->connection = new DBConnection();
            $formule = $formulePDO->getFormule($row["id_formule"]);
            $date_generation = $row['date_generation'];
            $code = $row['code'];
            $entrees_restantes = $row['entrees_restantes'];
            $infosCode = new Code($id_code, $formule, $date_generation, $code, $entrees_restantes);
            $infosCodes[] = $infosCode;
        }
        return $infosCodes;
    }

    // Initiate creation of a string as new code 
    public function newCode(Formule $formule) : String {
        $nbEntreesRestantes = $formule->getNb_entrees();
        do {
            $newCode = $this->generateCode();
        }
        while ($this->getId_Code($newCode) != 0);
        return $newCode;
    }

    // Generate a random 8 character string
    function generateCode() : String
    {
        $chars = ['1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G',
        'H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $code = "";
        for($i = 0; $i<8; $i++) {
            $code = $code . $chars[rand(0, count($chars)-1)];
            if ($i == 3) {
                $code = $code . '-';
            }
        }
        return $code;
    }

    // Add code to Code table
    function addCode(Formule $formule, String $code)
    {
        $idformule = $formule->getId_formule();
        $date_generation = date('Y-m-d H:i:s');
        $entrees_restantes = $formule->getNb_entrees();
        $MySQLQuery = 'INSERT INTO code (id_formule, date_generation, code, entrees_restantes)
        VALUES (?, ?, ?, ?)';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$idformule, $date_generation, $code, $entrees_restantes]);
    }

    // Return code ID if given code string exists in database
    function getId_Code(string $strCode) : int
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM code WHERE code = ?');
        $stmt->execute([$strCode]);
        $code = $stmt->fetch();
        // if code exists, return its id_code, else return 0
        return $code ? $code['id_code'] : 0;
    }
}