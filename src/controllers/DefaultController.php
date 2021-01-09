<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function setting(){
        $this->render('setting');
    }

    public function addresses(){
        $this->render('addresses');
    }
}