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
            $advertisement['date'],
            $advertisement['like'],
            $advertisement['id']
        );
    }

    public function addAdvertisement(Advertisement $advertisement):void
    {
        $date = new DateTime();
        $userRepo = new UserRepository();
        $email = ($_COOKIE['user']);
        $stmt = $this->database->connect()->prepare('
            INSERT INTO advertisements (name, surname, profession, address, telephone, description, id_assigned_by, image, created_at, date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $user = $userRepo->getUser($email);
        $assignedById = $userRepo->getUserId($user);

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
        $advertisements = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($advertisements as $advertisement){
            $result[] = new Advertisement(
                $advertisement['name'],
                $advertisement['surname'],
                $advertisement['profession'],
                $advertisement['description'],
                $advertisement['address'],
                $advertisement['telephone'],
                $advertisement['image'],
                $advertisement['date'],
                $advertisement['like'],
                $advertisement['id']
            );
        }
        return $result;
    }

    public function getAdvertisementsByProfession(string $profession): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE profession = :profession
        ');

        $stmt->bindParam(':profession', $profession, PDO::PARAM_STR);
        $stmt->execute();

        $advertisements = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($advertisements as $advertisement){
            $result[] = new Advertisement(
                $advertisement['name'],
                $advertisement['surname'],
                $advertisement['profession'],
                $advertisement['description'],
                $advertisement['address'],
                $advertisement['telephone'],
                $advertisement['image'],
                $advertisement['date'],
                $advertisement['like'],
                $advertisement['id']
            );
        }
        return $result;
    }

    public function getAdvertisementByAddress(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM advertisements WHERE LOWER(address) LIKE :address
        ');
        $stmt->bindParam(':address', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdvertisementBySearchParameters(string $address, string $date)
    {
        $searchCity = strtolower($address);

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM advertisements WHERE LOWER(address) LIKE :address AND date LIKE :date
        ');
        $stmt->bindParam(':address', $searchCity, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function like(int $id)
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE advertisements SET "like" = "like" + 1 WHERE id = :id
        ');

        $stmt->bindParam(':id', $id,PDO::PARAM_INT);
        $stmt->execute();
    }
}