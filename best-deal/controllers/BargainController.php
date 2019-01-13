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
    /**
     * BargainController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function bargain()
    {
        $mapper = new CommentMapper();
        $id = $_GET['id'];

        if ($this->isPost() && isset($_SESSION['id'])){

            date_default_timezone_set('Europe/Warsaw');
            $date = date('Y-m-d H:i:s');

            $mapper->setComment($date,$_POST['comment'], $_GET['id'],$_SESSION['id']);
        }

        $this->render('bargain', [ 'files' => $this->displayOne($id), 'comments' => $this->displayComments($id)]);

    }

    public function deleteBargain()
    {
        echo $_POST['id'];
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $bargain = new BargainMapper();
        $bargain->removeBargain((int)$_POST['id']);

        http_response_code(200);
    }

    public function deleteComment()
    {
        echo $_POST['id'];
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $comment = new CommentMapper();
        $comment->removeComment((int)$_POST['id']);

        http_response_code(200);
    }


    public function displayComments($id)
    {
        $arr= array();

        $mapper = new CommentMapper();

        $arr[] = $mapper->getComment($id);

        return $arr;

    }

    public function displayOne(int $id)
    {
        $mapper = new BargainMapper();
        return $mapper->getBargain($id);
    }

}