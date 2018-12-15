<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 15.12.18
 * Time: 14:06
 */
require_once ('Parameters.php');

class Database
{
    private $servername;
    private $username;
    private $password;
    private $database;


    public function __construct()
    {
        $this->servername = SERVERNAME;
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->database = DATABASE;
    }

    public function connect()
    {
        try {
            $pdo = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            return $pdo;
        }
        catch(PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
            exit();
        }
    }

}