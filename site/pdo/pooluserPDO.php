<?php
require_once('pdo/database.php');
require_once('model/pooluser.php');

class PooluserPDO
{
    private array $data = array();

    // Return 1 user from database
    public function read($id_user): ?Pooluser
    {
        $MySQLQuery = 'SELECT * FROM pool_user WHERE id_user = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_user]);
        $user = null;
        if (array_key_exists($id_user, $this->data)) {
            $user = $this->data[$id_user];
        } else {
            $user = $this->returnUsers($stmt->fetchAll())[0];
        }
        return $user;
    }

    // Return 1 user id from database
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

    // Return all pools in $rows and update $data
    private function returnUsers(array $rows): array
    {
        $users = [];
        foreach ($rows as $row) {
            $id_user = $row['id_user'];
            $login = $row['login'];
            $pwd = $row['password'];
            $name = $row['name'];
            $user = new Pooluser($login, $pwd, $name, $id_user);
            $users[] = $user;
            $this->data[$id_user] = $user;
        }
        return $users;
    }
}
