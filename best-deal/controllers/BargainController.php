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
        $this->render('bargain', [ 'files' => $this->display()]);
    }

    public function display(): array
    {
        $arr= array();

        $mapper = new BargainMapper();
        $mapper->getLenght();


        for($i =1; $i<=$mapper->getLenght(); $i++){
            $arr[] = $mapper->getBargain($i);
        }

        var_dump($arr);

        return $arr;

    }

}