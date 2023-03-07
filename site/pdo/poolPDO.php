<?php
require_once('pdo/database.php');

class PoolPDO
{
    private array $data = array();

    // Return 1 pool from database
    public function read(int $id_pool): Pool
    {
        $MySQLQuery = 'SELECT * FROM pool WHERE id_pool = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_pool]);
        $pool = null;
        if (array_key_exists($id_pool, $this->data)) {
            $pool = $this->data[$id_pool];
        } else {
            $pool = $this->returnPools($stmt->fetchAll())[0];
        }
        return $pool;
    }

    // Return all pools from database
    public function readAll(): array
    {
        $MySQLQuery = 'SELECT * FROM pool';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
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
            $id_pool = $row['id_pool'];
            $name = $row['name'];
            $address = $row['address'];
            $active = $row['active'];
            $picture = $row['picture'];
            $map = $row['map'];
            $description = $row['description'];
            $pool = new Pool($name, $address, $active, $picture, $map, $description, $id_pool);
            $pools[] = $pool;
            $this->data[$id_pool] = $pool;
        }
        return $pools;
    }
}
