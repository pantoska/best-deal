<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 08.01.19
 * Time: 09:58
 */
//require_once("AppController.php");
//
//require_once(__DIR__.'/../models/User.php');
//require_once __DIR__.'/../models/UserMapper.php';
//
//
//class AdminController extends AppController
//{
//    /**
//     * AdminController constructor.
//     */
//    public function __construct()
//    {
//        parent::__construct();
//    }
//
//    public function panel()
//    {
//        $mapper = new UserMapper();
//
//
//        if($this->isPost())
//        {
//            $id= $_POST['button'];
//            $mapper->removeUser($id);
//
//        }
//
//        $arr = $mapper->getUsers();
//        $this->render('panel', [ 'users' => $arr]);
//    }
//}

require_once 'AppController.php';

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserMapper.php';

class AdminController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        $user = new UserMapper();
        $this->render('index', ['user' => $user->getUser($_SESSION['email'])]);
    }

    public function users(): void
    {
        $user = new UserMapper();

        header('Content-type: application/json');
        http_response_code(200);

        echo $user->getUsers() ? json_encode($user->getUsers()) : '';
    }

    public function userDelete(): void
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $user = new UserMapper();
        $user->delete((int)$_POST['id']);

        http_response_code(200);
    }
}
