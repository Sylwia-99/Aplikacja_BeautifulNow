<?php


class Advertisement
{
    private $name;
    private $surname;
    private $profession;
    private $description;
    private $address;
    private $telephone;
    private $image;
    private $date;
    private $like ;
    private $id;

    public function __construct($name, $surname, $profession, $description, $address, $telephone, $image, $date, $like=0, $id = null)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->profession = $profession;
        $this->description = $description;
        $this->address = $address;
        $this->telephone = $telephone;
        $this->image = $image;
        $this->date = $date;
        $this->like = $like;
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getJob()
    {
        return $this->profession;
    }

    public function setJob($profession): void
    {
        $this->job = $profession;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getLike()
    {
        return $this->like;
    }

    public function setLike($like): void
    {
        $this->like = $like;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}