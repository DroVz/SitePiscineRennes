<?php

class DBConnection
{
	private ?PDO $database = null;

	public function getConnection(): PDO
	{
		if ($this->database === null) {
			try {
				$this->database = new PDO('mysql:host=localhost;dbname=pools;charset=utf8', "root", "");
			} catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
		}
		return $this->database;
	}
}
