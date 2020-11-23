<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppController
{
    public function login(){
        $user = new User("sylwia@pk.edu.pl", "admin", "Sylwia", "Rusek");

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];


        if($user->getEmail() != $email){
            return $this->render('login', ["messages" => ['USER WITH THIS EMAIL NOT EXIST!']]);
        }

        if($user->getPassword() != $password){
            return $this->render('login', ["messages" => ["WRONG PASSWORD!"]]);
        }

        //return $this->render('homepage');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/homepage");
    }

    public function register(){

        if(!$this->isPost()){
            return $this->render('register');
        }

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        echo $password_hash;exit();

    }

}