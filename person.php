<?php
class Person {
    public $name;
    public $email;
    public $phone;

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
}
$p1 = new Person();
$p1->name = "Sandip Rana";
$p1->email = "ranasandip245@gmail.com";
$p1->phone = "97808182";
$p1->displayUser();

$p2 = new Person();
$p2->name = "Sandip Chaudhary";
$p2->email = "chaudharysandip245@gmail.com";
$p2->phone = "97808182";
$p2->displayUser();
