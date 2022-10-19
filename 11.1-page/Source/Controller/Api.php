<?php

namespace Source\Controller;

class Api {

    public function get(?array $data) {
        $user = new \Source\Model\User($data['id']);
        $user = $user->getById();

        if (!$user) {
            echo json_encode([ "error" => "Not found" ]);
            return;
        }

        echo json_encode($user->getInfo());
    }

    public function getAll() {
        $users = \Source\Model\User::getAll();
        $data = [];

        if ($users) {
            foreach($users as $user) {
                $data[] = $user->getInfo();
            }
        }

        echo json_encode($data);
    }

    public function login() {
        if (!$_POST || !$_POST["email"] || !$_POST["password"]) {
            $output = [ "error" => "Must provide email and password" ];
        }
        else {
            $user = new \Source\Model\User(NULL, NULL, $_POST["email"], $_POST["password"]);
            
            if ($user->login()) {
                session_start();
                $_SESSION["user"] = $user;
                $output = [ "logged" => true ];
            }
            else {
                $output = [ "error" => "Email and password does not match" ];
            }
        }

        echo json_encode($output);
    }

    public function register() {
        if (!$_POST || !$_POST["email"] || !$_POST["password"] || !$_POST["name"]) {
            $output = [ "error" => "Must inform all fields" ];
        }
        else {
            $user = new \Source\Model\User(NULL, $_POST["name"], $_POST["email"], $_POST["password"]);
            $user->insert();

            $output["user"] = $user->getInfo();
        }

        echo json_encode($output);
    }

    public function logout() {
        session_start();
        unset($_SESSION["user"]);
    }

}