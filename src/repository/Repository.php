<?php

require_once __DIR__.'/../../DataBase.php';
class Repository
{

    protected $database;

    public function __construct()
    {
        $this->database = new DataBase();
    }
}