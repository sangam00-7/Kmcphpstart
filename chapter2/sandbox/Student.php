<?php

// Follow PSR standard

class Student
{
    private int $id;
    private string $name;
    private string $email;
    private string $enrolledAt;
    private array $marks = [];

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
            echo "The name should be between 3 and 30 characters";
            return false;
        }

        $this->name = $name;
        return true;
    }

    public function setEmail(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "The email address is not valid";
            return false;
        }

        $this->email = $email;
        return true;
    }

    public function addMarks(string $subject, int $score): bool
    {
        if ($score < 0 || $score > 100) {
            echo "The score should be between 0 to 100";
            return false;
        }

        $this->marks[$subject] = $score;
        return true;
    }

    public function displayReport(): void
    {
        echo "<h3>Report Card of {$this->name}</h3>";
        echo "<p>Student ID: {$this->id}</p>";
        echo "<p>Email: {$this->email}</p>";
        echo "<p>Enrolled At: {$this->enrolledAt}</p>";

        echo "<h4>Marks:</h4>";

        foreach ($this->marks as $subject => $score) {
            echo "<p>{$subject}: {$score}</p>";
        }
    }
}

$student1 = new Student("Doe", "John@demo.com");

$student1->addMarks("English", 85);
$student1->addMarks("Math", 90);
$student1->addMarks("Science", 88);

$student1->displayReport();
?>