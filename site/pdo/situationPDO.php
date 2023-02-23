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

    // Return all situations from database
    public function getSituations(): array
    {
        $stmt = DBConnection::getInstance()->prepare('SELECT * FROM situation WHERE active = 1;');
        $stmt->execute();
        return $this->returnSituations($stmt->fetchAll());
    }

    // TODO Add new situation to database
    public function create(): void
    {
    }

    // TODO Update existing situation
    public function update(): void
    {
    }

    // TODO Delete situation from database
    public function delete(): void
    {
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
