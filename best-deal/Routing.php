<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 15.12.18
 * Time: 12:29
 */

require_once('controllers/DefaultController.php');
require_once('controllers/BargainController.php');
require_once('controllers/UploadController.php');
require_once('controllers/AdminController.php');


class Routing
{
    public $routes = [];
    /**
     * Routing constructor.
     */
    public function __construct()
    {
        $this->routes =[
            'index' => [
                'action' => 'index',
                'controller' => 'DefaultController'
            ],
            'register' => [
                'action' => 'register',
                'controller' => 'DefaultController'
            ],
            'login' => [
                'action' => 'login',
                'controller' => 'DefaultController'
            ],
            'logout' => [
                'action' => 'logout',
                'controller' => 'DefaultController'
            ],
            'bargain' => [
                'action' => 'bargain',
                'controller' => 'BargainController'
            ],
            'delete_bargain' => [
                'action' => 'deleteBargain',
                'controller' => 'BargainController'
            ],
            'set_rate' => [
                'controller' => 'DefaultController',
                'action' => 'setRate'
            ],
            'delete_comment' => [
                'action' => 'deleteComment',
                'controller' => 'BargainController'
            ],
            'upload' => [
                'action' => 'upload',
                'controller' => 'UploadController'
            ],
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'index'
            ],
            'admin_users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'admin_delete_user' => [
                'controller' => 'AdminController',
                'action' => 'userDelete'
            ],
            'searcher' => [
                'controller' => 'DefaultController',
                'action' => 'searcher'
            ],
            'rate' => [
                'controller' => 'DefaultController',
                'action' => 'getRate'
            ],

        ];
    }
    public function run()
    {
        //localhost:8000/?page=login
        $page = isset($_GET['page'])
        && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'index';
        if($this->routes[$page]){
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];
            $object = new $controller;
            $object->$action();
        }
    }

}