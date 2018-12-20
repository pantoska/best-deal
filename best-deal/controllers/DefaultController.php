<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 15.12.18
 * Time: 13:02
 */
require_once("AppController.php");
require_once(__DIR__.'/../models/User.php');
require_once __DIR__.'/../models/UserMapper.php';

class DefaultController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Hello there 👋';

        $this->render('index', ['text' => $text]);
    }

    public function register(){
        $this->render('register');
        $sender = new UserMapper();

        if($this->isPost()){
            $sender->setUser($_POST['name'],$_POST['surname'],$_POST['email'],$_POST['password']);
            echo "Zarejestrowano";
            exit();
        }


    }

    public function login()
    {
        $mapper = new UserMapper();
        $user = null;

        if ($this->isPost()) {
            $user = $mapper->getUser($_POST['email']);
            if(!$user) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }
//            echo $user->getPassword().'\n';
//            echo $_POST['password'];

            if ($user->getPassword() !== $_POST['password']) {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {
                $_SESSION["id"] = $user->getEmail();
                $_SESSION["role"] = $user->getRole();

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=index");
                exit();
            }
        }
        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('index', ['text' => 'You have been successfully logged out!']);
    }
}