<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Advertisement.php';
require_once __DIR__.'/../repository/AdvertisementRepository.php';

class AdvertisementController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jepg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $advertisementRepository;

    public function __construct()
    {
        parent::__construct();
        $this->advertisementRepository = new AdvertisementRepository();
    }

    public function advertisementpage(){
        //TODO display advertisementpage.php
        $advertisementpage = $this->advertisementRepository->getAdvertisements();
        $this->render('advertisementpage', ['advertisementpage' => $advertisementpage]);
    }

    public function firstpage(){
        //TODO display firstpage.php
        $advertisementpage = $this->advertisementRepository->getAdvertisements();
        $this->render('firstpage', ['advertisementpage' => $advertisementpage]);
    }

    public function homepage(){
        //TODO display home.html
        $advertisementpage = $this->advertisementRepository->getAdvertisements();
        $this->render('homepage', ['advertisementpage' => $advertisementpage]);
    }


    public function addadvertisementpage()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $advertisement = new Advertisement($_POST['name'], $_POST['surname'], $_POST['job'], $_POST['description'], $_POST['address'], $_POST['telephone'], $_FILES['file']['name'], $_POST['date']);
            $this->advertisementRepository->addAdvertisement($advertisement);

            return $this->render('advertisementpage', [
                'advertisementpage' => $this->advertisementRepository->getAdvertisements(),
                'messages'=> $this ->messages, 'advertisement' => $advertisement]);
        }
        return $this ->render('addadvertisementpage',['messages'=> $this -> messages]);
    }

    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large to destination sile system.';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported';
            return false;
        }

        return true;
    }
}