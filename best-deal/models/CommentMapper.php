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
        $this->instance = parent::getInstance();
    }

    public function getComment(string $id)
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("SELECT c.id, c.content, b.title, u.username, c.time
                                            FROM comments c, bargains b, users u
                                            WHERE c.id_bargain = b.id AND c.id_comment_person = u.id and b.id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

                $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $comment;
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }

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

    public function removeComment(int $id)
    {
        try {
            $pdo = $this->instance->getConnection();
            $stmt = $pdo->prepare("DELETE FROM comments WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            exit();
        }

    }


}