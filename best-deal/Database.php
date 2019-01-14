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
    private static $instance = null;
    private $conn;

    private $servername;
    private $username;
    private $password;
    private $database;


    private function __construct()
    {
        $this->servername = SERVERNAME;
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->database = DATABASE;
    }

    public function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            return $this->conn;
        }
        catch(PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
            exit();
        }
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connect();
    }

}