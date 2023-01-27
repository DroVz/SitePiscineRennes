<?php

require_once('pdo/database.php');
require_once('pdo/formulePDO.php');
require_once('model/code.php');

class CodePDO
{
    public DBConnection $connection;
    private array $data = array();

    // Return 1 code from database
    function read(int $id_code): Code
    {
        $MySQLQuery = 'SELECT id_code, id_formule, date_generation, code, entrees_restantes
                        FROM code WHERE id_code = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$id_code]);
        $code = null;
        if (array_key_exists($id_code, $this->data)) {
            $code = $this->data[$id_code];
        } else {
            $code = $this->returnCodes($stmt->fetchAll())[0];
        }
        return $code;
    }

    // Return all codes from database
    public function readAll(): array
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM code;');
        $stmt->execute();
        return $this->returnCodes($stmt->fetchAll());
    }

    // Add new code to database
    public function create(Code $code): void
    {
        $MySQLQuery = 'INSERT INTO code (id_formule, date_generation, code, entrees_restantes)
        VALUES (?, ?, ?, ?)';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([
            $code->getFormule()->getId_formule(), $code->getDate_generation(),
            $code->getCodeString(), $code->getEntrees_restantes()
        ]);
    }

    // Initiate creation of a string as new code 
    public function newCode(Formule $formule): Code
    {
        // génération d'une chaîne correspondant au nouveau code
        $codeString = "";
        do {
            $codeString = $this->generateCode();
        } while ($this->getId($codeString) != 0);
        $date_generation = date('Y-m-d H:i:s');
        $entrees_restantes = $formule->getNb_entrees();
        $code = new Code($formule, $date_generation, $codeString, $entrees_restantes);
        return $code;
    }

    // Return code ID if given code string already exists in database
    public function getId(string $strCode): int
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM code WHERE code = ?');
        $stmt->execute([$strCode]);
        $code = $stmt->fetch();
        // if code exists, return its id_code, else return 0
        return $code ? $code['id_code'] : 0;
    }

    // Return all codes in $rows and update $data
    private function returnCodes($rows): array
    {
        $codes = [];
        foreach ($rows as $row) {
            $id_code = $row['id_code'];
            $formulePDO = new FormulePDO();
            $formulePDO->connection = new DBConnection();
            $formule = $formulePDO->read($row["id_formule"]);
            $date_generation = $row['date_generation'];
            $codeString = $row['code'];
            $entrees_restantes = $row['entrees_restantes'];
            $code = new Code($formule, $date_generation, $codeString, $entrees_restantes, $id_code);
            $codes[] = $code;
            $this->data[$id_code] = $code;
        }
        return $codes;
    }

    // Generate a random 8 character string as code
    private function generateCode(): String
    {
        $chars = [
            '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
            'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];
        $codeString = "";
        for ($i = 0; $i < 8; $i++) {
            $codeString = $codeString . $chars[rand(0, count($chars) - 1)];
            if ($i == 3) {
                $codeString = $codeString . '-';
            }
        }
        return $codeString;
    }
}
