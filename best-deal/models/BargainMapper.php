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

    public function getBargains(int $id): array {
        try {
            $pdo = $this->instance->getConnection();
//            $stmt = $pdo->prepare("SELECT * FROM bargains WHERE id = :id");
            $stmt = $pdo->prepare("SELECT bargains.id, bargains.title, bargains.price, bargains.image, bargains.description, users.username
                                  FROM bargains, users where bargains.id_user=users.id and bargains.id=:id");
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
        $stmt = $pdo->prepare("SELECT * FROM bargains;");
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function setBargain(string $image,string $title, string $price, string $description, int $id_user){
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("INSERT into bargains (title, price, image, description, id_user) VALUES (?,?,?,?,?)");
            $stmt->execute([$title, $price, $image, $description, $id_user]);
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }
}