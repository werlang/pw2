<?php

namespace Source\Controller;

class Api {

    public function get(?array $data) {
        $user = new \Source\Model\User();
        $user = $user->getById($data['id']);

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

}