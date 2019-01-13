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

    public function getBargainName(string $pattern)
    {
        $pdo = $this->instance->getConnection();
        $stmt = $pdo->prepare("SELECT bargains.id, bargains.title, bargains.price, bargains.image, bargains.description, users.username
                                  FROM bargains, users where bargains.id_user =users.id and bargains.title LIKE '%{$pattern}%'");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if($stmt->rowCount()) {
            $bargain = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $bargain;
        }
    }

    public function getBargains() {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("
            SELECT bargains.id, bargains.title, bargains.price, bargains.image, bargains.description, 
            users.username, SUM(IFNULL(rates.rate, 0)) as rates
            FROM bargains LEFT OUTER JOIN rates ON bargains.id=rates.id_bargain, users
            WHERE bargains.id_user=users.id GROUP BY(bargains.id)
            UNION
            SELECT bargains.id, bargains.title, bargains.price, bargains.image, bargains.description, 
            users.username, SUM(IFNULL(rates.rate, 0)) as rates
            FROM bargains RIGHT OUTER JOIN rates ON bargains.id=rates.id_bargain, users
            WHERE bargains.id_user=users.id GROUP BY(bargains.id);
          ");

            $stmt->execute();

            $bargain = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $bargain;
    }

    public function getBargain(int $id)
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT bargains.id, bargains.title, bargains.price, bargains.image, bargains.description, users.username
                                  FROM bargains, users where bargains.id_user=users.id and bargains.id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $bargain = $stmt->fetch(PDO::FETCH_ASSOC);
            return $bargain;
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }


    public function setBargain(string $image,string $title, string $price, string $description, int $id_user){
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("INSERT into bargains (title, price, image, description, id_user) VALUES (?,?,?,?,?)");
            $stmt->execute([$title, $price, $image, $description, $id_user]);

            $s = $stmt->fetch(PDO::FETCH_ASSOC);

            return $s;
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function removeBargain(int $id)
    {
        $pdo = $this->instance->getConnection();
        $stmt = $pdo->prepare("DELETE FROM bargains WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}