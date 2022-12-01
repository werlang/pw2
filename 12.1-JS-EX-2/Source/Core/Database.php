<?php

namespace Source\Core;

class Database {
    private const OPTIONS = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL
    ];

    private static $instance = NULL;
    private static $config = NULL;

    public function __construct() {
        return $this;
    }

    public static function getInstance() {
        if (self::$instance) {
            return self::$instance;
        }

        if (!self::$config) {
            $file = file_get_contents(__DIR__ ."/../../config.json");    
            self::$config = json_decode($file)->mysql;
        }

        try {
            self::$instance = new \PDO(
                "mysql:host=" . self::$config->host . ";dbname=" . self::$config->database,
                self::$config->user,
                self::$config->password,
                self::OPTIONS
            );
        } catch (\PDOException $exception) {
            echo "Problemas ao Conectar...";
            echo $exception;
            return false;
        }

        return self::$instance;
    }

    public function query($query, $args) {
        $stmt = self::getInstance()->prepare($query);
        $stmt->execute($args);
        return $stmt;
    }

    public function getLastId() {
        return self::getInstance()->lastInsertId();
    }

    public function queryAll($query, $args) {
        $stmt = $this->query($query, $args);
        return $stmt->fetchAll();
    }
}