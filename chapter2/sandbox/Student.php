<?php

// Follow PSR standard

class Student
{
    private int $id;
    private string $name;
    private string $email;
    private string $enrolledAt;
    private static int $nextId = 1;
    private static int $totalStudents = 0;
    public function __construct(string $name, string $email)
    {
        $this->id = self::$nextId++;
        $this->setName($name);
        $this->setEmail($email);
        $this->enrolledAt = date('Y-m-d');
        self::$totalStudents++;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setName(string $name): bool
    {
        if (strlen($name) < 3 || strlen($name) > 30) {
            echo "The name should be between 3 and 30 characters.";
            return false;
        }
        $this->name = $name;
        return true;
    }
    public function setEmail(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "The email address is not valid.";
            return false;
        }
        $this->email = $email;
        return true;
    }
    public function displayReport(): void
    {
        echo "<h3>Report Card of {$this->name}</h3>";
        echo "<p>Student ID: {$this->id}</p>";
        echo "<p>Email: {$this->email}</p>";
    }
}
$student1 = new Student("Doe", "John@demo.com");
echo $student1->getEmail();
$student1->displayReport();
?>