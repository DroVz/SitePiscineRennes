<?php
require_once('pdo/database.php');
require_once('model/pooluser.php');

class PooluserPDO
{
    // Return 1 user from database
    public function getId(string $login, string $pwd): int
    {
        $MySQLQuery = 'SELECT * FROM pool_user WHERE login = ? AND password = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([
            $login,
            hash('sha256', $pwd)
        ]);
        $pooluser = $stmt->fetch();
        return $pooluser ? $pooluser['id_user'] : 0;
    }

    // Not used
    public function readAll(): void
    {
    }

    // Not used
    public function create(): void
    {
    }

    // Not used
    public function update(): void
    {
    }

    // Not used
    public function delete(): void
    {
    }
}
