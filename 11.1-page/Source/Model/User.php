<?php

namespace Source\Model;

class User {
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct(
        ?int $id = NULL,
        ?string $name = NULL, 
        ?string $email = NULL, 
        ?string $password = NULL
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;

        if ($password) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->db = new \Source\Core\Database();
    
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->query($query, [ "id" => $id ]);

        if($stmt->rowCount() == 0){
            return false;
        } 

        $user = $stmt->fetch();
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;

        return $this;
    }

    public static function getAll() {
        $query = "SELECT * FROM users";
        $stmt = (new \Source\Core\Database())->query($query, []);

        if($stmt->rowCount() == 0){
            return false;
        } 

        $users = [];
        while($user = $stmt->fetch()) {
            $users[] = new User($user->id, $user->name, $user->email, NULL);
        }
        return $users;
    }

    public function getInfo() {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email
        ];
    }

}