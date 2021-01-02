<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function settingpage(){
        $this->render('settingpage');
    }

    public function favouritepage(){
        $this->render('favouritepage');
    }

    public function historypage(){
        $this->render('historypage');
    }

    public function addressespage(){
        $this->render('addressespage');
    }
}