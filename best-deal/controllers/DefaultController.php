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
        $this->render('index', ['files' => $this->getAllBargains(), 'rate' => $this->getRates()]);
    }

    public function register()
    {
        $userMapper = new UserMapper();

        if ($this->isPost()) {

            if ($userMapper->getUser($_POST['email']) != null)
                return $this->render('register', ['message' => ['This email is already registered']]);
            if ($_POST['password'] != $_POST['password_confirmation'])
                return $this->render('register', ['message' => ['Wrong password']]);
            if ($userMapper->getUsername($_POST['username']))
                return $this->render('register', ['message' => ['This username is already registered']]);

            $userMapper->setUser($_POST['name'], $_POST['surname'], $_POST['username'], $_POST['email'], md5($_POST['password']));

            $url = "http://$_SERVER[HTTP_HOST]/";
            echo "<script> alert('Zarejestrowano!'); window.location.href='{$url}?page=index'; </script>";
            exit();
        }
        $this->render('register');
    }

    public function login()
    {
        $mapper = new UserMapper();

        if ($this->isPost()) {
            if (!($user = $mapper->getUser($_POST['email']))) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }

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
        $mapper = new BargainMapper();

        if ($this->isPost()) {
            if ($mapper->getBargainByName($_POST['text']) != null) {
                $this->render('searcher', ['files' => $mapper->getBargainByName($_POST['text'])]);
            } else {
                $url = "http://$_SERVER[HTTP_HOST]/";
                echo "<script> alert('Not found any bargain with that pattern'); window.location.href='{$url}?page=index'; </script>";
            }
        }
    }

    public function getAllBargains()
    {
        $mapper = new BargainMapper();
        return $mapper->getBargains();;
    }

    private function checkRate($arr)
    {
        if ($arr == 1) {
            if ((int)$_POST['rate'] == -1)
                $rate = -2;
            else
                $rate = -1;
        } else if ($arr == -1) {
            if ((int)$_POST['rate'] == 1)
                $rate = 2;
            else
                $rate = 1;
        } else
            $rate = (int)$_POST['rate'];

        return $rate;
    }

    public function setRate()
    {
        $status = null;
        $mapper = new RatesMapper();

        if (!isset($_POST['id_bargain']) || !isset($_POST['id_user']) || !isset($_POST['rate']))
        {
            http_response_code(404);
            return;
        }

        $currentRate = $mapper->getRate((int)$_POST['id_bargain'], (int)$_POST['id_user']);

        if (is_bool($currentRate))
        {
            $new = true;
            $rate = (int)$_POST['rate'];
        }
        else{
                $new = false;
                $rate = $this->checkRate($currentRate);
            }

        $mapper->setRate($new, $rate, (int)$_POST['id_bargain'], (int)$_POST['id_user']);
        $response = $mapper->getRatesSum((int)$_POST['id_bargain']);

        echo $response;
        http_response_code(200);
    }

    public function getRates()
    {
        $bargainMapper = new BargainMapper();
        $ratesMapper = new RatesMapper();
        $ratesArray = array();

        $bargains = $bargainMapper->getBargains();

        if (isset($_SESSION) && !empty($_SESSION)) {
            foreach ($bargains as $key => $bargain) {
                $rate = $ratesMapper->getRate($bargain['id'], $_SESSION['id']);

                if (is_bool($rate))
                    array_push($ratesArray, 0);
                else
                    array_push($ratesArray, $rate);
            }
        }
        return $ratesArray;
    }
}