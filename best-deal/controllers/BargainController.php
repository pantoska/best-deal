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
        $this->render('bargain', [ 'files' => $this->getImages()]);
        $this->render('bargain');

    }

    private function getNotHidden(array $files) {
        foreach($files as $key=>$file) {
            if ($file[0] === '.') {
                unset($files[$key]);
            };

        }
        return $files;
    }
    private function getImages(): array
    {
        $mapper = new BargainMapper();
//        $files = scandir(dirname(__DIR__) .'/public/upload/');
        $files = $mapper->getBargain();

        return $this->getNotHidden($files);
    }

//    public function display(){
//
//        $mapper = new BargainMapper();
//        $bargain = null;
//
//        if ($this->isPost()) {
//            $bargain = $mapper->getBargain();
//            if(!$bargain) {
//                return $this->render('Cannot load bargains');
//            }
//
//        }
//        $this->render('bargain');
//    }

}