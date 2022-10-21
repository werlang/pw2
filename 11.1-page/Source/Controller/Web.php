<?php

namespace Source\Controller;

class Web {
    public function __construct($path) {
        $this->view = new \Source\Core\View('/Source/View');
    }

    public function home() {
        // include __DIR__ . "/../View/index.html";
        $this->view->render('index', []);
    }

    public function about() {
        include __DIR__ . "/../View/about.html";
    }

    public function login() {
        $this->view->render('login', []);
    }

    public function register() {
        $this->view->render('register', []);
    }

    public function profile() {
        // include __DIR__ . "/../View/profile.html";

        // $user = new \Source\Model\User(NULL, "aaa", "aaa", "aaa");

        // echo "<input type='hidden' class='template-vars' id='name' value='{$user->getName()}'>";
        // echo "<input type='hidden' class='template-vars' id='email' value='{$user->getEmail()}'>";

        session_start();
        if (!isset($_SESSION["user"])) {
            header("Location:index.php");
            return;
        }
        
        $user = new \Source\Model\User($_SESSION["user"]->getInfo()["id"]);
        $user->getById();

        $this->view->render('profile', [
            "name" => $user->getName(),
            "email" => $user->getEmail()
        ]);
    }
}