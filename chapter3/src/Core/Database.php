<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    public PDO $connection;

    public function __construct()
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
        } catch (PDOException $e) {
            die("Database Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}