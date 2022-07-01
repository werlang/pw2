<?php

require "connection.php";

$output = [ "message" => "unsupported action" ];

if ($_GET["action"] === "get") {
    $field = false;
    $available_args = ['id', 'name', 'email'];
    
    foreach ($_GET as $key => $value) {
        if (in_array($key, $available_args)) {
            $field = $key;
            break;
        }
    }
    
    $output = [ "message" => "wrong argument" ];
    
    $field_sql = "";
    $field_data = [];
    if ($field) {
        $field_sql = "WHERE $field = ?";
        $field_data = [ $_GET[$field] ];
    }

    $sql = "SELECT * FROM users $field_sql";
    $query = $conn->prepare($sql);
    $query->execute($field_data);

    $count = 0;
    while ($result = $query->fetch(PDO::FETCH_OBJ)) {
        $row = [];
        foreach ($result as $key => $value) {
            $row[$key] = $value;
        }
        $output["results"][$count] = $row;
        $count++;
    }
    $output["message"] = "OK";
}
else if ($_GET["action"] === "insert") {
    if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["password"])) {
        $output["message"] = "must inform all fields";
    }
    else {
        $sql = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password)";
        $query = $conn->prepare($sql);
        $query->execute([
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        ]);
        $output["message"] = "OK";
    }
}
else if ($_GET["action"] === "update") {
    $output["message"] = "must inform user id";
    if (isset($_GET["id"])) {
        foreach ($_POST as $field => $value) {
            $sql = "UPDATE users SET $field = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->execute([ $value, $_GET["id"] ]);
        }
        $output["message"] = "OK";
    }
}
else if ($_GET["action"] === "delete") {
    $output["message"] = "must inform user id";
    if (isset($_GET["id"])) {
        $sql = "DELETE FROM users WHERE id = ?";
        $query = $conn->prepare($sql);
        $query->execute([ $_GET["id"] ]);
        $output["message"] = "OK";
    }
}

echo json_encode($output);