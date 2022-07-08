<?php
$conn = new PDO(
    "mysql:host=localhost;dbname=aula_pwii",
    "aula",
    "asdf1234"
);

// $sql = "INSERT INTO users (name, email, password) VALUES ('Aluno','aluno@email.com','minhaSenha')";
$sql = "SELECT * FROM users";

$query = $conn->exec($sql);


while ($row = $query->fetch(PDO::FETCH_OBJ)) {
    echo "ID: {$row->id}, Nome: {$row->name}<br>";
}

// echo "<pre>";
// var_dump($query);
// echo "</pre>";