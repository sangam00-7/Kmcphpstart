<?php
class Book {
    public string $title;
    public string $author;
    public int $price;
    public static int $bookcounter = 0;

    public function __construct(string $title, string $author, int $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
        self::$bookcounter++;
    }

    public function displayBook() : void {
        echo "<br>";
        echo $this->title;
        echo "<br>";
        echo $this->author;
        echo "<br>";
        echo $this->price;
    }


    public static function getCounter(): int {
        return self::$bookcounter;
    }
}

$book1 = new Book("Better Than The Movies", "Dinesh Chaudhary", 500);
$book1->displayBook();
echo "<br>";

$book2 = new Book("Nepali","Laxmi Datta Bhatta", 500);
$book2->displayBook();
echo "<br>";

echo "The total number of books so far: " . Book::getCounter();
?>