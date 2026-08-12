<?php
class Book
{
    public string $title;
    public string $author;
    public int $price;
    public function __construct(string $title, string $author, int $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }
    public function displayBook(): void
    {
        echo "<br>";
        echo $this->title;
        echo "<br>";
        echo $this->author;
        echo "<br>";
        echo $this->price;
        echo "<br>";
    }
}
$book1 = new Book("Discrete Structure", "Data Communication", 500);
$book1->displayBook();