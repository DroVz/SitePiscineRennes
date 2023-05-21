<?php
require_once('pdo/database.php');
require_once('model/situation.php');
class SituationPDO
{
    private array $data = array();

    // Return 1 situation from database
    public function getSituation(int $id_situation): Situation
    {
        $stmt = DBConnection::getInstance()->prepare('SELECT * FROM situation WHERE id_situation = ?');
        $stmt->execute([$id_situation]);
        $situation = null;
        if (array_key_exists($id_situation, $this->data)) {
            $situation = $this->data[$id_situation];
        } else {
            $situation = $this->returnSituations($stmt->fetchAll())[0];
        }
        return $situation;
    }

    // Return all active situations which have offers
    public function getActiveSituations(): array
    {
        $MySQLQuery = 'SELECT * FROM situation s
        WHERE s.id_situation in (SELECT DISTINCT id_situation FROM offer) AND s.active = 1;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnSituations($stmt->fetchAll());
    }

    // Return all situations from database
    public function getSituations(): array
    {
        $stmt = DBConnection::getInstance()->prepare('SELECT * FROM situation;');
        $stmt->execute();
        return $this->returnSituations($stmt->fetchAll());
    }

    // Add new situation to database
    public function create(Situation $situation): int
    {
        $MySQLQuery = 'INSERT INTO situation (name, active)
        VALUES (?, ?)';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([
            $situation->getName(),
            $situation->getActive()
        ]);
        return DBConnection::getInstance()->lastInsertId();
    }

    // Update existing situation
    public function update(Situation $situation): bool
    {
        $res = false;
        $MySQLQuery = 'UPDATE situation SET name=?, active=? WHERE id_situation=?';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        if ($stmt->execute([
            $situation->getName(),
            $situation->getActive(),
            $situation->getIdSituation()
        ])) {
            $res = true;
        }
        return $res;
    }

    // Return all situations in $rows and update $data
    private function returnSituations(array $rows): array
    {
        $situations = [];
        foreach ($rows as $row) {
            $id_situation = $row['id_situation'];
            $name = $row['name'];
            $active = $row['active'];
            $situation = new Situation($name, $active, $id_situation);
            $situations[] = $situation;
            $this->data[$id_situation] = $situation;
        }
        return $situations;
    }
}
