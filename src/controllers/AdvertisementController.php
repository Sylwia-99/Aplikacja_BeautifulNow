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

    public function advertisements(){
        $advertisements = $this->advertisementRepository->getAdvertisements();
        $this->render('advertisements', ['advertisements' => $advertisements]);
    }

    public function first(){
        $advertisements = $this->advertisementRepository->getAdvertisements();
        $this->render('first', ['advertisements' => $advertisements]);
    }

    public function home(){
        $advertisements = $this->advertisementRepository->getAdvertisements();
        $this->render('home', ['advertisements' => $advertisements]);
    }

    public function hairdressers(){
        $hairdressers = $this->advertisementRepository->getAdvertisementsByProfession('Fryzjer');
        $this->render('hairdressers', ['hairdressers' => $hairdressers]);
    }

    public function makeupartists(){
        $makeupartists = $this->advertisementRepository->getAdvertisementsByProfession('Makijażysta');
        $this->render('makeupartists', ['makeupartists' => $makeupartists]);
    }

    public function barbers(){
        $barbers = $this->advertisementRepository->getAdvertisementsByProfession('Barber');
        $this->render('barbers', ['barbers' => $barbers]);
    }

    public function nailsstylists(){
        $nailsstylists = $this->advertisementRepository->getAdvertisementsByProfession('Stylista paznokci');
        $this->render('nailsstylists', ['nailsstylists' => $nailsstylists]);
    }


    public function eyebrowstylists(){
        $eyebrowstylists = $this->advertisementRepository->getAdvertisementsByProfession('Stylista brwi');
        $this->render('eyebrowstylists', ['eyebrowstylists' => $eyebrowstylists]);
    }

    public function addadvertisement()
    {
        if(!isset($_COOKIE['user'])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $advertisement = new Advertisement($_POST['name'], $_POST['surname'], $_POST['job'], $_POST['description'], $_POST['address'], $_POST['telephone'], $_FILES['file']['name'], $_POST['date']);
            $this->advertisementRepository->addAdvertisement($advertisement);

            return $this->render('advertisements', [
                'advertisements' => $this->advertisementRepository->getAdvertisements(),
                'messages'=> $this ->messages, 'advertisement' => $advertisement]);
        }
        return $this ->render('addadvertisement',['messages'=> $this -> messages]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->advertisementRepository->getAdvertisementByAddress($decoded['address']));
        }
    }

    public function searches()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->advertisementRepository->getAdvertisementBySearchParameters(
                $decoded['address'],
                $decoded['date'])
            );
        }
    }

    public function like(int $id){
        $this->advertisementRepository->like($id);
        http_response_code(200);
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