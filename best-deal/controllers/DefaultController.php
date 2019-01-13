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

require_once(__DIR__.'/../models/RatesMapper.php');


class DefaultController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('index', [ 'files' => $this->display(), 'rate' => $this->getRate()]);
    }

    public function register(){

        $sender = new UserMapper();

        if($this->isPost()){

            if($sender->getUser($_POST['email']) != null)
                return $this->render('register', ['message' => ['Ten email jest zajęty']]);

            if( $_POST['password'] != $_POST['password_confirmation'])
                return $this->render('register', ['message' => ['Hasła się nie zgadzają']]);


            if($sender->getUsername($_POST['username']))
                return $this->render('register', ['message' => ['Username jest zajęty']]);

            $sender->setUser($_POST['name'],$_POST['surname'],$_POST['username'],$_POST['email'],md5($_POST['password']));

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=index");
        }

        $this->render('register');

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
            if ($user->getPassword() !== md5($_POST['password'])) {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {

                $_SESSION["id"] = $mapper->getId($_POST['email']);
                $_SESSION["email"] = $user->getEmail();
                $_SESSION["role"] = $user->getRole();
                $_SESSION['username'] = $user->getUsername();

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

        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=index");

    }

    public function searcher()
    {
        $arr = array();
        $mapper = new BargainMapper();

        if ($this->isPost()) {

            $arr[] = $mapper->getBargainName($_POST['text']);

            if ($mapper->getBargainName($_POST['text']) != null) {
                $this->render('searcher', [ 'files' => $arr]);
            }
            else {
                echo "<script> alert('Not found any bargain with that pattern'); window.location.href='http://localhost:8080/?page=index'; </script>";
            }
        }

    }

    public function display()
    {
        $mapper = new BargainMapper();

        $bargains = $mapper->getBargains();

//        print_r($bargains);

        return $bargains;
    }

    public function setRate(){

        $status = null;
        $mapper = new RatesMapper();



//        echo (int)$_POST['rate'];
//        echo (int)$_POST['id_bargain'];
//        echo (int)$_POST['id_user'];

        if (!isset($_POST['id_bargain']) || !isset($_POST['id_user']) || !isset($_POST['rate'])  ) {
            http_response_code(404);
            return;
        }

        $arr = $mapper->getRate((int)$_POST['id_bargain'],(int)$_POST['id_user']);

        if(!is_bool($arr)){
            $status = false;
        }
        else
            $status = true;

        $mapper->setRate($status,(int)$_POST['rate'],(int)$_POST['id_bargain'],(int)$_POST['id_user']);
        $response = $mapper->getSum((int)$_POST['id_bargain']);

        echo $response;

//        print_r('array'.$arr);

        http_response_code(200);



    }

    public function getRate()
    {
        $bmapper = new BargainMapper();
        $rmapper = new RatesMapper();
        $arr = array();

        $bargains = $bmapper->getBargains();

        if(isset($_SESSION) && !empty($_SESSION))
        {
            foreach ($bargains  as $key => $bargain){

                $rate = $rmapper->getRate($bargain['id'], $_SESSION['id']);

                if(is_bool($rate)){
                    array_push($arr, 0);
                }else
                    array_push($arr, $rate);

            }

//            print_r($arr);

//            return $arr;
        }

        return $arr;
    }
}