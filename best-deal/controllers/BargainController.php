<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 20.12.18
 * Time: 13:19
 */

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
        $this->render('bargain', [ 'img' => $this->getImages()]);
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
        $files = scandir(dirname(__DIR__) .'/public/upload/');

        return $this->getNotHidden($files);
    }

}