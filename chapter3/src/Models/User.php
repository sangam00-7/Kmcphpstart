<?php

namespace App\Models;

use App\Core\Database;

class User
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private string $createdAt;
    private ?string $bio = null;

    private static int $nextId = 1;
    private static int $totalUsers = 0;

    public function __construct(
        string $username,
        string $email,
        string $password
    ) {
        $this->id = self::$nextId++;

        $this->setUserName($username);
        $this->setEmail($email);
        $this->setPassword($password);

        $this->createdAt = date('Y-m-d H:i:s');

        self::$totalUsers++;
    }

    public function setUserName(string $username): bool
    {
        $username = trim($username);

        if (strlen($username) < 3 || strlen($username) > 50) {
            echo "The username should be between 3 and 50 characters.<br>";
            return false;
        }

        if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            echo "The username should only contain letters, numbers, and underscores.<br>";
            return false;
        }

        $this->username = $username;

        return true;
    }

    public function setEmail(string $email): bool
    {
        $email = trim($email);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "The email address is not valid.<br>";
            return false;
        }

        $this->email = strtolower($email);

        return true;
    }

    public function setPassword(string $password): bool
    {
        if (strlen($password) < 6) {
            echo "The password should be at least 6 characters long.<br>";
            return false;
        }

        $this->password = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        return true;
    }

    public static function create(
        string $username,
        string $email,
        string $password
    ): int|false {

        $username = strtolower(trim($username));
        $email = strtolower(trim($email));

        if (strlen($username) < 3 || strlen($username) > 50) {
            return false;
        }

        if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if (strlen($password) < 6) {
            return false;
        }

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $pdo = Database::getInstance()->getConnection();

        $sql = "INSERT INTO users (username, email, password)
                VALUES (:username, :email, :password)";

        $stmt = $pdo->prepare($sql);

        $result = $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);

        return $result
            ? (int) $pdo->lastInsertId()
            : false;
    }

    public function displayUser(): void
    {
        echo "<p>Username: " . htmlspecialchars($this->username) . "</p>";
        echo "<p>Email: " . htmlspecialchars($this->email) . "</p>";
    }
}