<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function settingpage(){
        //TODO display settingpage.php
        $this->render('settingpage');
    }

    public function favouritepage(){
        //TODO display favouritepage.php
        $this->render('favouritepage');
    }

    public function historypage(){
        //TODO display historypage.php
        $this->render('historypage');
    }

    public function addressespage(){
        //TODO display addressespage.php
        $this->render('addressespage');
    }

    public function hairdresserspage(){
        //TODO display hairdresserspage.php
        $this->render('hairdresserspage');
    }

    public function makeupartistspage(){
        //TODO display makeupartistspage.php
        $this->render('makeupartistspage');
    }

    public function barberspage(){
        //TODO display barberspage.php
        $this->render('barberspage');
    }

    public function nailsstylistspage(){
        //TODO display nailstylistspage.php
        $this->render('nailsstylistspage');
    }

    public function eyebrowstylistspage(){
        //TODO display eyebrowstylistspage.php
        $this->render('eyebrowstylistspage');
    }
}