<?php
$conn = new PDO(
    "mysql:host=localhost;dbname=aula_pwii",
    "aula",
    "asdf1234"
);

$sql = "INSERT INTO users (name, email, password) VALUES ('Foo bar','teste@email.com','aaa')";
$query = $conn->query($sql);

echo "<pre>";
var_dump($query);
echo "</pre>";