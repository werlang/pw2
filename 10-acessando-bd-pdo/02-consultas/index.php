<?php

require __DIR__ . "/source/Boot/config.php";
require __DIR__ . "/source/autoload.php";

// use Source\Database\Connect;
$db = \Source\Database\Connect::getInstance();

echo "<h2>INSERT com Query</h2>";

$insert = "INSERT INTO users (name, email, password) VALUES ('Fábio Luís da Silva Santos','fabiosantos@ifsul.edu.br','23465')";

try{
    $query = $db->query($insert);
    var_dump(
        $query,
        $db->lastInsertId(),
        $query->errorInfo()
    );
}catch (PDOException $exception) {
    var_dump($exception);
}


echo "<h2>SELECT com Query</h2>";

$select = "SELECT * FROM users LIMIT 4";

try {
    $query = $db->query($select);
    var_dump([
        $query,
        $query->rowCount(),
        $query->fetchAll()
    ]);
} catch (PDOException $exception){
    var_dump($exception);
}

echo "<h2>UPDATE com Exec</h2>";

$update = "UPDATE users SET name = 'Carlos Eduardo Cunnha' WHERE id = 5";

try {
   $query = $db->exec($update);
   var_dump($query);
} catch (PDOException $exception) {
    var_dump($exception);
}

echo "<h2>DELETE com Exec</h2>";

$delete = "DELETE FROM users WHERE id > 5";

try {
    $query = $db->exec($delete);
    var_dump($query);
} catch (PDOException $exception) {
    var_dump($exception);
}

