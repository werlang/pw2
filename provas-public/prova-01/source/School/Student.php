<?php

namespace Source\School;

use Source\Database\Connect;

class Student
{
    private $id;
    private $name;
    private $email;
    private $register; // matricula

    public function __construct(
        ?int $id = NULL,
        ?string $name = NULL, 
        ?string $email = NULL, 
        ?string $register = NULL
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->register = $register;
    }

    /**
     * Insere um registro na tabela students (Estudante)
     */
    public function insert ()
    {
        $bd = Connect::getInstance();
        $query = "INSERT INTO students VALUES (NULL, :name, :email,:register)";
        $stmt = $bd->prepare($query);
        $stmt->execute([
            "name" => $this->name,
            "email" => $this->email,
            "register" => $this->register
        ]);
        $this->id = $bd->lastInsertId();
    }

    /**
     * @param string $name
     * Busca um nome na tabela students um nome passado por parâmetro, se não encontrado emite a mensagem
     * "Estudante não Encontrado!"
     */
    public function findByName(string $name)
    {
        $query = "SELECT * FROM students WHERE name = ?";
        $stmt = Connect::getInstance()->prepare($query);

        $stmt->execute([ $name ]);

        if($stmt->rowCount() == 0){
            echo "Estudante não Encontrado!";
        } else {
            $student = $stmt->fetch();
            $this->id = $student->id;
            $this->name = $student->name;
            $this->email = $student->email;
            $this->register = $student->register;
        }
    }

    /**
     * @param int $id
     * Realiza a atualização dos dados de um Estudante pelo ID informado por parâmetro
     */
    public function update()
    {
        $query = "UPDATE students SET ";
        
        $pieces = [];
        $execValues = [];
        if ($this->name) {
            $pieces[] = "name = :name";
            $execValues["name"] = $this->name;
        }
        if ($this->email) {
            $pieces[] = "email = :email";
            $execValues["email"] = $this->email;
        }
        if ($this->register) {
            $pieces[] = "register = :register";
            $execValues["register"] = $this->register;
        }
        $query .= implode(",", $pieces);
        $query .= " WHERE id = :id";
        
        $execValues["id"] = $this->id;
        
        $stmt = Connect::getInstance()->prepare($query);

        $stmt->execute($execValues);

    }
}