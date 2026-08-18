<?php

namespace App\Core;
Use PDO;

class Database{
    public PDO $connection;

    public function_construct()
    {
        $dsn = "mysql:host=localhost; port=3306; dbname=kmcphpstart;charset=utf8mb4";

        try{
            $this->connection = new PDO($dsn, "dofy", "1111");
        } catch(PDOException $e){
            echo "Database Connection failed: " . $e->getMessage();
        }
    }
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}