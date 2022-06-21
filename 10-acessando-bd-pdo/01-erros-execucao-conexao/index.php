<?php

try {

} catch (PDOException $exception){
    var_dump($exception);
}
finally {
    echo "<p>Execução Terminou!</p>";
}

echo "---------------";

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=bd-pwii",
        "root",
        "",
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]
    );

    $stmt = $pdo->query("SELECT * FROM users LIMIT 3");

    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)){ // mode do fetch PDO::FETCH_ASSOC
        var_dump($user);
    }

} catch (PDOException $exception) {
    var_dump($exception);
    echo "<p>{$exception->getMessage()}</p>";
}