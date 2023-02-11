<?php

class DBConnection
{
	private ?PDO $database = null;
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname = 'pools';

	public function getConnection(): PDO
	{
		if ($this->database === null) {
			try {
				$this->database = new PDO(
					'mysql:host=' . $this->host . ';dbname=' . $this->dbname,
					$this->username,
					$this->password,
					array(
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
					)
				);
			} catch (PDOException $e) {
				die('<h1>Erreur : impossible de se connecter à la base de données</h1>');
			}
		}
		return $this->database;
	}
}
