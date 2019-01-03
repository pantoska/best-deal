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

require_once(__DIR__.'/../models/Bargain.php');
require_once(__DIR__.'/../models/BargainMapper.php');


class DefaultController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('index', [ 'files' => $this->display()]);
    }

    public function register(){
        $this->render('register');
        $sender = new UserMapper();

        if($this->isPost() && $this->confirmPass()){
            $sender->setUser($_POST['name'],$_POST['surname'],$_POST['username'],$_POST['email'],md5($_POST['password']));
            echo "Zarejestrowano";
            exit();
        }
        else{
            echo "Podaj poprawne dane";
        }
    }

    private function confirmPass()
    {
        $pass = $_POST['password'];
        $confirm =$_POST['password_confirmation'];
        if($pass == $confirm)
            return true;
        return false;
    }

    public function login()
    {
        $mapper = new UserMapper();
        $user = null;

        if ($this->isPost()) {
            if(!$mapper->getUser($_POST['email'])) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }
            $user = $mapper->getUser($_POST['email']);
            var_dump($user);
            if ($user->getPassword() !== md5($_POST['password'])) {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {
                $_SESSION["id"] = $mapper->getId($_POST['email']);
//                echo $mapper->getId($_POST['email']);
                $_SESSION["email"] = $user->getEmail();
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

    public function display(): array
    {
        $arr= array();

        $mapper = new BargainMapper();
        $mapper->getLenght();


        for($i =1; $i<=$mapper->getLenght(); $i++){
            $arr[] = $mapper->getBargains($i);
        }

//        var_dump($arr);

        return $arr;
    }
}