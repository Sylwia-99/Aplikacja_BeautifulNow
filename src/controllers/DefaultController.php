<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function setting(){
        $this->render('setting');
    }

    public function favourite(){
        $this->render('favourite');
    }

    public function history(){
        $this->render('history');
    }

    public function addresses(){
        $this->render('addresses');
    }
}