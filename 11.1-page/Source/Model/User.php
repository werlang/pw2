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
        $this->password = $password;

        $this->db = new \Source\Core\Database();
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getById() {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->query($query, [ "id" => $this->id ]);

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

    public function insert() {
        $query = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->db->query($query, [
            "email" => $this->email,
            "name" => $this->name,
            "password" => password_hash($this->password)
        ]);

        $this->id = $this->db->getLastId();
        return $this;
    }

    public function login() {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->query($query, [ "email" => $this->email ]);

        if($stmt->rowCount() == 0){
            return false;
        }

        $user = $stmt->fetch();

        if (!password_verify($this->password, $user->password)) {
            return false;
        }

        $this->id = $user->id;
        $this->name = $user->name;
        return $this;
    }

}