<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login(){
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render( "login", ["messages" => ['User not exist!']]);
        }

        if($user->getEmail() != $email){
            return $this->render('login', ["messages" => ['USER WITH THIS EMAIL NOT EXIST!']]);
        }

        if($user->getPassword() != $password){
            return $this->render('login', ["messages" => ["WRONG PASSWORD!"]]);
        }

        setcookie('email', $email, time()+60);

        //return $this->render('homepage', ['messages' => ['Hellow'.$email]]);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/homepage");
    }

    public function logout(){
        session_start();
        session_destroy();
        echo "You session";

        //return $this->render('homepage', ['messages' => ['Hellow'.$email]]);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function register(){
        $user = new User();
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