<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function firstpage(){
        //TODO display firstpage.html
        $this->render('firstpage');
    }

    public function login(){
        //TODO display login.html
        $this->render('login');
    }

    public function homepage(){
        //TODO display home.html
        $this->render('homepage');
    }

    public function settingpage(){
        //TODO display settingpage.html
        $this->render('settingpage');
    }

    public function favouritepage(){
        //TODO display favouritepage.html
        $this->render('favouritepage');
    }

    public function addressespage(){
        //TODO display addressespage.html
        $this->render('addressespage');
    }
}