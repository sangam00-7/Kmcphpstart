<?php
class Person {
    public $name;
    public $email;
    public $phone;
    public static int $personcounter = 0;
    public function __construct() {
        self::$personcounter++;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function displayUser() 
    {
        echo "<br>";
        echo $this->name;
        echo "<br>";
        echo $this->email;
        echo "<br>";    
        echo $this->phone;
        echo "<br>";
      
    }
     public static function getCounter(): int {
        return self::$personcounter;
    }
}
$p1 = new Person();
$p1->name = "Sandip Rana";
$p1->email = "ranasandip245@gmail.com";
$p1->phone = "97808182";
$p1->displayUser();

$p2 = new Person();
$p2->name = "Sandip Chaudhary";
$p2->email = "sandip245@gmail.com";
$p2->phone = "97808182";
$p2->displayUser();
echo "The total number of persons so far: " . Person::getCounter();
