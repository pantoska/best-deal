<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 15.12.18
 * Time: 12:29
 */

require_once('controllers/DefaultController.php');

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
            ]
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