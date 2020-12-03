<?php


class Advertisement
{
    private $name;
    private $surname;
    private $job;
    private $address;
    private $telephone;
    private $image;

    public function __construct($name, $surname, $job, $address, $telephone, $image)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->job = $job;
        $this->address = $address;
        $this->telephone = $telephone;
        $this->image = $image;
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

    public function getJob()
    {
        return $this->job;
    }

    public function setJob($job): void
    {
        $this->job = $job;
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
}