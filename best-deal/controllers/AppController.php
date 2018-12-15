<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 15.12.18
 * Time: 12:41
 */

class AppController
{
    private $request = null;

    public function __construct()
    {
        $this->request = strtolower($_SERVER['REQUEST_METHOD']);
        session_start();
    }

    public function isGet()
    {
        return $this->request === 'get';
    }

    public function isPost()
    {
        return $this->request === 'post';
    }

    public function render(string $fileName = null, $variables = [])
    {
        $view = $fileName ? dirname(__DIR__).'/views/'.get_class($this).'/'.$fileName.'.php' : '';

        $output = 'There isn\'t such file to open';

        if (file_exists($view)) {

            extract($variables);

            ob_start();
            include $view;
            $output = ob_get_clean();
        }

        print $output;
    }

}