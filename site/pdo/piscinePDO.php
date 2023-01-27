<?php

require_once('pdo/database.php');
require_once('model/piscine.php');

class PiscinePDO
{
    public DBConnection $connection;
    private array $data = array();

    // Return 1 pool from database
    public function read(int $id_piscine): Piscine
    {
        $MySQLQuery = 'SELECT * FROM piscine WHERE id_piscine = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$id_piscine]);
        $pool = null;
        if (array_key_exists($id_piscine, $this->data)) {
            $pool = $this->data[$id_piscine];
        } else {
            $pool = $this->returnPools($stmt->fetchAll())[0];
        }
        return $pool;
    }

    // Return all pools from database
    public function readAll(): array
    {
        $MySQLQuery = 'SELECT * FROM piscine';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnPools($stmt->fetchAll());
    }

    // TODO Add new pool to database
    public function create(): void
    {
    }

    // TODO Update existing pool
    public function update(): void
    {
    }

    // TODO Delete pool from database
    public function delete(): void
    {
    }

    // Return all pools in $rows and update $data
    private function returnPools(array $rows): array
    {
        $pools = [];
        foreach ($rows as $row) {
            $id_piscine = $row['id_piscine'];
            $nom = $row['nom'];
            $adresse = $row['adresse'];
            $actif = $row['actif'];
            $image = $row['image'];
            $map = $row['map'];
            $descriptif = $row['descriptif'];
            $pool = new Piscine($nom, $adresse, $actif, $image, $map, $descriptif, $id_piscine);
            $pools[] = $pool;
            $this->data[$id_piscine] = $pool;
        }
        return $pools;
    }
}
