<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?self $instance = null;

    private PDO $connection;

    private function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=php_workshop;charset=utf8mb4";

        try {
            $this->connection = new PDO(
                $dsn,
                'root',
                ''
            );

            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $this->connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

        } catch (PDOException $e) {
            die("Database Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}