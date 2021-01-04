<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Advertisement.php';
class AdvertisementRepository extends Repository
{
    public function getAdvertisement(int $id): ?Advertisement
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.advertisements WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $advertisement = $stmt->fetch(PDO::FETCH_ASSOC);

        if($advertisement == false){
            return null; //tu powinien byc wyjatek [napisac metode ktora bd zwracałą exception ktora mowi, ze nie zrwaca uzytkownika i łapany w try catch)
        }

        return new Advertisement(
            $advertisement['name'],
            $advertisement['surname'],
            $advertisement['profession'],
            $advertisement['description'],
            $advertisement['address'],
            $advertisement['telephone'],
            $advertisement['image'],
            $advertisement['date']
        );
    }

    public function addAdvertisement(Advertisement $advertisement):void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO advertisements (name, surname, profession, address, telephone, description, id_assigned_by, image, created_at, date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $assignedById = 1; //to zrobić na podstawie sesji uzytkownika

        $stmt->execute([
            $advertisement->getName(),
            $advertisement->getSurname(),
            $advertisement->getJob(),
            $advertisement->getAddress(),
            $advertisement->getTelephone(),
            $advertisement->getDescription(),
            $assignedById,
            $advertisement->getImage(),
            $date->format('Y-m-d'),
            $advertisement->getDate()
        ]);
    }

    public function getAdvertisements(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements
        ');

        $stmt->execute();
        $advertisementpage = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($advertisementpage as $advertisement){
            $result[] = new Advertisement(
                $advertisement['name'],
                $advertisement['surname'],
                $advertisement['profession'],
                $advertisement['description'],
                $advertisement['address'],
                $advertisement['telephone'],
                $advertisement['image'],
                $advertisement['date']
            );
        }

        return $result;
    }

    public function getHairdresserAdvertisements(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE profession=\'Fryzjer\'
        ');

        $stmt->execute();
        $hairdresserspage = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($hairdresserspage as $advertisement){
            $result[] = new Advertisement(
                $advertisement['name'],
                $advertisement['surname'],
                $advertisement['profession'],
                $advertisement['description'],
                $advertisement['address'],
                $advertisement['telephone'],
                $advertisement['image'],
                $advertisement['date']
            );
        }

        return $result;
    }

    public function getMakeUpArtistAdvertisements(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE profession=\'Makijażysta\'
        ');

        $stmt->execute();
        $makeupartistspage = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($makeupartistspage as $advertisement){
            $result[] = new Advertisement(
                $advertisement['name'],
                $advertisement['surname'],
                $advertisement['profession'],
                $advertisement['description'],
                $advertisement['address'],
                $advertisement['telephone'],
                $advertisement['image'],
                $advertisement['date']
            );
        }

        return $result;
    }

    public function getBarberAdvertisements(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE profession=\'Barber\'
        ');

        $stmt->execute();
        $barberspage = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($barberspage as $advertisement){
            $result[] = new Advertisement(
                $advertisement['name'],
                $advertisement['surname'],
                $advertisement['profession'],
                $advertisement['description'],
                $advertisement['address'],
                $advertisement['telephone'],
                $advertisement['image'],
                $advertisement['date']
            );
        }

        return $result;
    }

    public function getNailsStylistAdvertisements(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE profession=\'Stylista paznokci\'
        ');

        $stmt->execute();
        $nailsstylistspage = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($nailsstylistspage as $advertisement){
            $result[] = new Advertisement(
                $advertisement['name'],
                $advertisement['surname'],
                $advertisement['profession'],
                $advertisement['description'],
                $advertisement['address'],
                $advertisement['telephone'],
                $advertisement['image'],
                $advertisement['date']
            );
        }

        return $result;
    }

    public function getEyebrowsStylistAdvertisements(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE profession=\'Stylista brwi\'
        ');

        $stmt->execute();
        $eyebrowstylistspage = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($eyebrowstylistspage as $advertisement){
            $result[] = new Advertisement(
                $advertisement['name'],
                $advertisement['surname'],
                $advertisement['profession'],
                $advertisement['description'],
                $advertisement['address'],
                $advertisement['telephone'],
                $advertisement['image'],
                $advertisement['date']
            );
        }

        return $result;
    }

    public function getAdvertisementByAddress(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM advertisements WHERE LOWER(address) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}