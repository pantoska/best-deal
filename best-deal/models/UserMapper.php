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
        $this->instance = parent::getInstance();
    }

    public function getId(string $email)
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user['id'];
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function getUser( string $email )
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$user['email'])
                return null;

            return new User($user['name'], $user['surname'], $user['username'], $user['email'], $user['password'], $user['role']);
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function setUser(string $name, string $surname, string $username, string $email, string $password)
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("INSERT INTO users (name, surname, username, email, password, role) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$name, $surname, $username, $email,$password,'user']);
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function getUsername(string $username)
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user)
                return true;
            return false;
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function getUsers()
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email != :email;");
            $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
            $stmt->execute();

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function deleteUser(int $id)
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch (PDOException $e) {
            die();
        }
    }
}