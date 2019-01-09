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
        if ($this->isPost() && !isset($_SESSION)){
            date_default_timezone_set('Europe/Warsaw');
            $date = date('Y-m-d H:i:s');


            $mapper->setComment($date,$_POST['comment'], $_GET['id'],$_SESSION['id']);

        }

        $this->render('bargain', [ 'files' => $this->displayOne($id), 'comments' => $this->displayComments($id)]);

    }


    public function displayComments($id):array
    {
        $arr= array();

        $mapper = new CommentMapper();
        $mapper->getLenght();

        $arr[] = $mapper->getComment($id);

        return $arr;

    }

    public function displayOne(int $id)
    {
        $mapper = new BargainMapper();
        return $mapper->getBargains($id);
    }

}