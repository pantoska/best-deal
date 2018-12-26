<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 15.12.18
 * Time: 14:10
 */
require_once 'User.php';
require_once __DIR__.'/../Database.php';

class UserMapper extends Database
{
    private $instance = null;
    public function __construct()
    {
        parent::__construct();
        $this->instance = $this->getInstance();

    }

    public function getUser( string $email ): User {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return new User($user['name'], $user['surname'], $user['email'], $user['password']);
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function setUser(string $name, string $surname, string $email, string $password){
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("INSERT INTO users (name, surname, email, password) VALUES (?,?,?,?)");
            $stmt->execute([$name, $surname, $email,$password]);
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }
}