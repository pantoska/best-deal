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

    public function getBargain( int $id): array {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT * FROM bargain WHERE idbargain = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if($stmt->rowCount()) {
                $bargain = $stmt->fetch(PDO::FETCH_ASSOC);
//                var_dump($bargain);
//                while ($bargain = $stmt->fetch(PDO::FETCH_ASSOC))
//                return new Bargain($bargain['title'], $bargain['price'], $bargain['image'], $bargain['description']);
                return $bargain;
            }
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function getLenght()
    {
        $pdo = $this->instance->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM bargain;");
        $stmt->execute();

        return $stmt->rowCount();
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