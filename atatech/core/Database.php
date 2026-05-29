<?php

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $config = require __DIR__ . '/../config/database.php';
        
        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
            $this->connection = new PDO($dsn, $config['username'], $config['password'], $config['options']);
        } catch (PDOException $e) {
            // Veritabanı yoksa oluşturmayı dene
            if ($e->getCode() == 1049) {
                try {
                    $dsnNoDb = "mysql:host={$config['host']};charset={$config['charset']}";
                    $tempConnection = new PDO($dsnNoDb, $config['username'], $config['password']);
                    $tempConnection->exec("CREATE DATABASE IF NOT EXISTS `{$config['dbname']}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                    $this->connection = new PDO($dsn, $config['username'], $config['password'], $config['options']);
                } catch (PDOException $e2) {
                    throw new Exception("Database connection failed: " . $e->getMessage() . ". Please create the database manually.");
                }
            } else {
                throw new Exception("Database connection failed: " . $e->getMessage());
            }
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function query($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetch($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }

    public function fetchAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }

    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
}
