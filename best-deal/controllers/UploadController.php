<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 20.12.18
 * Time: 14:06
 */

require_once("AppController.php");
require_once(__DIR__.'/../models/Bargain.php');
require_once(__DIR__.'/../models/BargainMapper.php');

class UploadController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/jpg', 'image/png'];

    private $message = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function upload()
    {
        $sender = new BargainMapper();

        if($this->isPost() && $this->validate($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name']))
        {
            if(!empty($_FILES['file']['tmp_name']) && file_exists($_FILES['file']['tmp_name'])) {
                $sender->setBargain($_FILES['file']['name'],$_POST['title'],$_POST['price'],$_POST['description']);
            }
//            var_dump($_FILES['file']);
            move_uploaded_file
            ($_FILES['file']['tmp_name'],
                dirname(__DIR__).'/public/upload/'
                .$_FILES['file']['name']);
            exit();
        }
        $this->render('upload');
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }

        return true;
    }

}