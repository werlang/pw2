<?php

// try {

// } catch (PDOException $exception){
//     var_dump($exception);
// }
// finally {
//     echo "<p>Execução Terminou!</p>";
// }

// echo "---------------";

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=bd-pwii",
        "root",
        ""
    );

    $stmt = $pdo->query("SELECT * FROM users LIMIT 3");

    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)){ // mode do fetch PDO::FETCH_ASSOC
        echo "<pre>";
        var_dump($user);
        echo "</pre>";
    }
    
} catch (PDOException $exception) {
    echo "<pre>";
    var_dump($exception);
    echo "</pre>";
    echo "<p>{$exception->getMessage()}</p>";
}