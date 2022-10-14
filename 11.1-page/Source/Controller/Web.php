<?php

namespace Source\Controller;

class Web {
    public function __construct($path) {
        $this->view = new \Source\Core\View('/Source/View');
    }

    public function home() {
        // include __DIR__ . "/index.html";
        echo $this->view->render('index', []);
    }

    public function about() {
        include __DIR__ . "/../View/about.html";
    }

    public function profile() {
        $user = new \Source\Model\User(NULL, "Pablo", "pablowerlang@ifsul.edu.br", "123456");
        
        // include __DIR__ . "/../View/profile.html";

        // echo "<input type='hidden' class='template-vars' id='name' value='{$user->getName()}'>";
        // echo "<input type='hidden' class='template-vars' id='email' value='{$user->getEmail()}'>";
        $this->view->render('profile', [
            "name" => $user->getName(),
            "email" => $user->getEmail()
        ]);
    }
}