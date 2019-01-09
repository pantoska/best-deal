<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 08.01.19
 * Time: 09:58
 */
require_once("AppController.php");
require_once(__DIR__.'/../models/User.php');
require_once __DIR__.'/../models/UserMapper.php';

class AdminController extends AppController
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function panel()
    {
        $mapper = new UserMapper();

        var_dump($_GET['id']);

        if($this->isPost())
        {
            $id= $_POST['button'];
            $mapper->removeUser($id);

        }

        $arr = $mapper->getUsers();
        $this->render('panel', [ 'users' => $arr]);
    }
}