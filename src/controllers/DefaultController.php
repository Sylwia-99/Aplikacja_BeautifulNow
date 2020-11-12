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

    public function hairdresserspage(){
        //TODO display hairdresserspage.html
        $this->render('hairdresserspage');
    }

    public function makeupartistspage(){
        //TODO display makeupartistspage.html
        $this->render('makeupartistspage');
    }

    public function barberspage(){
        //TODO display barberspage.html
        $this->render('barberspage');
    }

    public function nailsstylistspage(){
        //TODO display nailstylistspage.html
        $this->render('nailsstylistspage');
    }

    public function eyebrowstylistspage(){
        //TODO display eyebrowstylistspage.html
        $this->render('eyebrowstylistspage');
    }
    
}