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
            $advertisement['job'],
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
                $advertisement['job'],
                $advertisement['description'],
                $advertisement['address'],
                $advertisement['telephone'],
                $advertisement['image'],
                $advertisement['date']
            );
        }

        return $result;
    }
}