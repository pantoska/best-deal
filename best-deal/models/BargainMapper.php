<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 27.12.18
 * Time: 00:26
 */

class BargainMapper extends Database
{
    private $instance = null;
    public function __construct()
    {
        parent::__construct();
        $this->instance = $this->getInstance();

    }

    public function getBargain() {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT image FROM bargain");
            $stmt->execute();

            $bargain = $stmt->fetchAll();
            return $bargain;
//            $bargain = $stmt->fetch(PDO::FETCH_ASSOC);
//            return new Bargain($bargain['title'], $bargain['price'], $bargain['image'], $bargain['description']);
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function setBargain(string $image,string $title, string $price, string $description){
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("INSERT into bargain (title, price, image, description) VALUES (?,?,?,?)");
            $stmt->execute([$title, $price, $image, $description]);
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }
}