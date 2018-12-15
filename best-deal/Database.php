<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 15.12.18
 * Time: 14:06
 */

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
        $this->database = $this->username;
    }

    public function connect()
    {
        try {
            return new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
        }
        catch(PDOException $e)
        {
            return 'Connection failed: ' . $e->getMessage();
        }
    }

}