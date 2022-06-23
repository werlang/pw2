<?php

require __DIR__ . "/source/Boot/config.php";
require __DIR__ . "/source/autoload.php";

use Source\Database\Connect;

echo "<h2>INSERT com Query</h2>";

$insert = "INSERT INTO users (name, email, password) VALUES ('Fábio Luís da Silva Santos','fabiosantos@ifsul.edu.br','23465')";

$query = Connect::getInstance()->query($insert);
var_dump(
    $query,
    Connect::getInstance()->lastInsertId(),
    $query->errorInfo()
);


echo "<h2>SELECT com Query</h2>";

$select = "SELECT * FROM users LIMIT 4";


$query = Connect::getInstance()->query($select);
var_dump([
    $query,
    $query->rowCount(),
    $query->fetchAll()
]);

echo "<h2>UPDATE com Exec</h2>";

$update = "UPDATE users SET name = 'Carlos Eduardo Cunnha' WHERE id = 5";

$query = Connect::getInstance()->exec($update);
var_dump($query);


echo "<h2>DELETE com Exec</h2>";

//$delete = "DELETE FROM users WHERE id > 5";

//$query = Connect::getInstance()->exec($delete);
//var_dump($query);