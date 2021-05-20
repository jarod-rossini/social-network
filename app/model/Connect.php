<?php

namespace App\Model;

use PDO;
use Exception;

class Connect
{
	private $DB_HOST;
	private $DB_NAME;
	private $DB_USER;
	private $DB_PASSWORD;
	protected $pdo;

	function __construct(string $DB_HOST, string $DB_NAME, string $DB_USER, string $DB_PASSWORD)
	{
		$this->DB_HOST = $DB_HOST;
		$this->DB_NAME = $DB_NAME;
		$this->DB_USER = $DB_USER;
		$this->DB_PASSWORD = $DB_PASSWORD;
		$this->pdo = $this->getconnect();
	}

	public function getconnect()
	{
		try{
			$this->pdo = new PDO('mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME.';charset=utf8', $this->DB_USER, $this->DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->pdo;
        }
        catch(Exception $errorConnection)
        {
            die ('Erreur de connexion :'.$errorConnection->getMessage());
        }
    }
}