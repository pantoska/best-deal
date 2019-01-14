<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 12.01.19
 * Time: 18:45
 */

class RatesMapper extends Database
{
    private $instance = null;
    public function __construct()
    {
        $this->instance = parent::getInstance();
    }

    public function setRate(bool $check,int $rate, int $id_bargain, int $id_comment_person)
    {
        try {
            $pdo = $this->instance->getConnection();

            if($check) {
                $begin = $pdo->prepare("INSERT INTO rates(rate,id_bargain,id_comment_person) VALUES (?,?,?)");
                $begin->execute([$rate, $id_bargain, $id_comment_person]);
            }
            else{
                $stmt = $pdo->prepare("UPDATE rates SET rate= rate + :rate WHERE id_bargain=:id_bargain AND id_comment_person=:id_comment_person;");
                $stmt->bindParam(':id_bargain', $id_bargain, PDO::PARAM_INT);
                $stmt->bindParam(':id_comment_person', $id_comment_person, PDO::PARAM_INT);
                $stmt->bindParam(':rate', $rate, PDO::PARAM_INT);
                $stmt->execute();
            }
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function getRate(int $id_bargain, int $id_comment_person)
    {
        try {
            $pdo = $this->instance->getConnection();
            $bargain = $pdo->prepare("
                                    SELECT bargains.id, rates.id_comment_person, rates.rate
                                    FROM bargains,rates 
                                    WHERE rates.id_bargain = bargains.id 
                                    AND bargains.id=:id_bargain AND rates.id_comment_person=:id_comment_person;
                                    ");
            $bargain->bindParam(':id_bargain', $id_bargain, PDO::PARAM_INT);
            $bargain->bindParam(':id_comment_person',  $id_comment_person, PDO::PARAM_INT);
            $bargain->execute();

            $sum = $bargain->fetch(PDO::FETCH_ASSOC);

            if(is_bool($sum))
                return true;
            else {
                return $sum['rate'];
            }
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }

    public function getRatesSum(int $id_bargain)
    {
        try {
            $pdo = $this->instance->getConnection();
            $sum = $pdo->prepare("SELECT SUM(rates.rate) as rate 
                                        FROM bargains,rates WHERE rates.id_bargain = bargains.id 
                                        AND bargains.id =:id_bargain;");
            $sum->bindParam(':id_bargain', $id_bargain, PDO::PARAM_INT);
            $sum->execute();
            $response = $sum->fetch(PDO::FETCH_ASSOC);

            return $response['rate'];
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }
}