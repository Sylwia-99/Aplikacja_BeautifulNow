<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{

    private $userRepository;
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){
        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $user = $this->userRepository->getUser($email);

        if(!$user){
            return $this->render( 'login', ["messages" => ['User not exist!']]);
        }

        if($user->getEmail() != $email){
            return $this->render('login', ["messages" => ['USER WITH THIS EMAIL NOT EXIST!']]);
        }

        if($user->getPassword() != $password){
            return $this->render('login', ["messages" => ["WRONG PASSWORD!"]]);
        }

        $cookie_name = 'user';
        $cookie_value = $_POST["email"];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');

        if(isset($_COOKIE['user'])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
        }
    }

    public function logout(){
        if(isset($_COOKIE['user'])){
            setcookie(($_COOKIE['user']), '', time()-7000000, '/');
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
    }

    public function register(){

        if(!$this->isPost()){
            return $this->render('register');
        }

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmedPassword = $_POST['confirmedPassword'];
        //$password_hash = password_hash($password, PASSWORD_DEFAULT);
        $phone= $_POST['phone'];

        if($password !== $confirmedPassword){
            return $this->render("register", ["messages" => ["Please provide proper password!"]]);
        }

        $user = new User($email, md5($password), $name, $surname);
        $user->setPhone($phone);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);

    }

}