<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 02.01.19
 * Time: 13:00
 */

class CommentMapper extends Database
{
    private $instance = null;
    public function __construct()
    {
        parent::__construct();
        $this->instance = $this->getInstance();
    }

    public function getComment(string $id): array
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT c.content, b.title, u.username, c.time
                                            FROM comments c, bargains b, users u
                                            WHERE c.id_bargain = b.id AND c.id_comment_person = u.id and b.id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

//            echo $stmt->rowCount();
            if($stmt->rowCount()) {
                $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $comment;
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
        $stmt = $pdo->prepare("SELECT * FROM comments, bargains WHERE comments.id_bargain=bargains.id AND bargains.id=1;");
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function setComment(string $time, string $content, int $id_bargain, int $id_comment_person)
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("INSERT into comments (content, time, id_bargain, id_comment_person) VALUES (?,?,?,?)");
            $stmt->execute([$content, $time,$id_bargain,$id_comment_person]);
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }

    }


}