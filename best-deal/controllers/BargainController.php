<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 20.12.18
 * Time: 13:19
 */
require_once("AppController.php");
require_once(__DIR__.'/../models/Bargain.php');
require_once(__DIR__.'/../models/BargainMapper.php');
require_once(__DIR__.'/../models/Comment.php');
require_once(__DIR__.'/../models/CommentMapper.php');

class BargainController extends AppController
{
    private $commentMapper;
    private $bargainMapper;

    /**
     * BargainController constructor.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function bargain()
    {
        $this->commentMapper = new CommentMapper();

        if ($this->isPost() && isset($_SESSION['id'])){

            date_default_timezone_set('Europe/Warsaw');
            $date = date('Y-m-d H:i:s');

            $this->commentMapper->setComment($date,$_POST['comment'],$_GET['id'],$_SESSION['id']);
        }
        $this->render('bargain', [ 'files' => $this->getBargain($_GET['id']), 'comments' => $this->getAllComments($_GET['id'])]);
    }

    public function deleteBargain()
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $this->bargainMapper= new BargainMapper();
        $this->bargainMapper->removeBargain((int)$_POST['id']);

        http_response_code(200);
    }

    public function deleteComment()
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $comment = new CommentMapper();
        $comment->removeComment((int)$_POST['id']);

        http_response_code(200);
    }


    public function getAllComments(int $id)
    {
        $this->commentMapper = new CommentMapper();
        $comments = $this->commentMapper->getComment($id);
        return $comments;
    }

    public function getBargain(int $id)
    {
        $this->bargainMapper = new BargainMapper();
        return $this->bargainMapper->getBargain($id);
    }

}