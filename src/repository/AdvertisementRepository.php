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

    public function deleteAdvertisement(int $id)
    {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM advertisements WHERE id = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getAdvertisements(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE ordered_by IS NULL 
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

    public function getYourAdvertisements(string $email): ?array
    {
        $result = [];
        $userRepo = new UserRepository();
        $user = $userRepo->getUser($email);
        if($user==null){
            return null;
        }
        $assignedById = $userRepo->getUserId($user);

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE id_assigned_by = :assignedById 
        ');

        $stmt->bindParam(':assignedById', $assignedById, PDO::PARAM_INT);
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

    public function getAdvertisementsByProfession(string $profession): ?array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE profession = :profession AND ordered_by IS NULL
        ');

        $stmt->bindParam(':profession', $profession, PDO::PARAM_STR);
        $stmt->execute();

        $advertisements = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($advertisements == false){
            return null;
        }

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
                $advertisement['id'],
            );
        }
        return $result;
    }

    public function getAdvertisementByAddress(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM advertisements WHERE LOWER(address) LIKE :address AND ordered_by IS NULL 
        ');
        $stmt->bindParam(':address', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdvertisementBySearchParameters(string $address, string $date)
    {
        $searchCity = strtolower($address);

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM advertisements WHERE LOWER(address) LIKE :address AND date LIKE :date AND ordered_by IS NULL 
        ');
        $stmt->bindParam(':address', $searchCity, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdvertisementByOrdered(string $email): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisements WHERE ordered_by = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
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

    public function getFavouriteAdvertisement(String $email): ?array
    {
        $result = [];
        $userRepo = new UserRepository();
        $user = $userRepo->getUser($email);
        if($user == null){
            return null;
        }
        $id = $userRepo->getUserId($user);
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM favourite_advertisements f 
            LEFT JOIN users u ON f.id_user = u.id 
            LEFT JOIN advertisements a ON f.id_advertisement = a.id
            WHERE id_user = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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

    public function getSavedAdvertisements(String $email): ?array
    {
        $result = [];
        $userRepo = new UserRepository();
        $user = $userRepo->getUser($email);
        if($user == null){
            return null;
        }
        $id = $userRepo->getUserId($user);
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM advertisements a
            LEFT JOIN users_advertisements ud
            ON a.id = ud.id_advertisement WHERE id_assigned_by = :id
            AND a.id = ud.id_advertisement
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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

    public function like(int $id)
    {
        if(isset($_COOKIE['user'])){
            $stmt = $this->database->connect()->prepare('
            UPDATE advertisements SET "like" = "like" + 1 WHERE id = :id
        ');

            $stmt->bindParam(':id', $id,PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function order(String $email, int $id)
    {
        if(isset($_COOKIE['user'])){
            $stmt = $this->database->connect()->prepare('
            UPDATE public.advertisements SET ordered_by = :email WHERE id = :id
        ');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->execute();
        }
    }

    public function addToFavourite(int $id)
    {
        if(isset($_COOKIE['user'])){
            $stmt = $this->database->connect()->prepare('
            INSERT INTO favourite_advertisements (id_user, id_advertisement)
            VALUES (?, ?)
        ');

            $email = ($_COOKIE['user']);
            $userRepo = new UserRepository();
            $user = $userRepo->getUser($email);
            $stmt->execute([
                $userRepo->getUserId($user),
                $id
            ]);
        }
    }

    public function addToSaved(int $id)
    {
        if(isset($_COOKIE['user'])){
            $stmt = $this->database->connect()->prepare('
            INSERT INTO users_advertisements (id_user, id_advertisement)
            VALUES (?, ?)
        ');

            $email = ($_COOKIE['user']);
            $userRepo = new UserRepository();
            $user = $userRepo->getUser($email);
            $stmt->execute([
                $userRepo->getUserId($user),
                $id
            ]);
        }

    }
}