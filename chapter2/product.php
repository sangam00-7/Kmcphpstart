<?php
class Product
{
    private string $name;
    private int $price;
    private float $quantity;
    public function __construct(string $name, int $price, float $quantity)
    {
        $this->setproductName($name);
        $this->setprice($price);
        $this->setquantity($quantity);
    }
    public function getproductName(): string
    {
        return $this->name;
    }
    public function setproductName(string $name): bool
    {
        if (strlen($name) < 3) {
            echo "Name should have at least 3 characters";
            return false;
        }
        if (!preg_match('/^[a-zA-Z ]+$/', $name)) {
            echo "Name should not contain numbers or special characters";
            return false;
        }
        $this->name = $name;
        return true;
    }
    public function setprice(int $price): bool
    {
        if ($price < 0) {
            echo "Price can't be a negative number";
            return false;
        }
        $this->price = $price;
        return true;
    }
    public function setquantity(float $quantity): bool
    {
        if ($quantity < 1) {
            echo "Quantity can't be less than 1";
            return false;
        }
        $this->quantity = $quantity;
        return true;
    }
    public function displayProduct(): void
    {
        echo "<br>";
        echo __CLASS__;
        echo "<br>";
        echo "Name: " . $this->name;
        echo "<br>";
        echo __METHOD__;
        echo "<br>";
        echo "Price: " . $this->price;
        echo "<br>";
        echo __FUNCTION__;
        echo "<br>";
        echo "Quantity: " . $this->quantity;
        echo "<br>";
    }
}
$P1 = new Product("PHP", 100000, 50);
$P1->displayProduct();
?>