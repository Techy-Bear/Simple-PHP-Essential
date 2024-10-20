<?php

// Managing user sessions
session_start(); //start a session (can be use to resume the session too if inside a new webpage)
// this must be the very first thing in your script before any HTML tags

//sample data
$username = "Charles";
$password = "password123";

if ($username === "Charles" && $password === "password123"){

    $_SESSION["username"] = $username;
    $_SESSION["loggedin"] = true;

    #_SESSION is a super global variable use to store and access session variable

    echo "Login successful! Welcome, ". $_SESSION["username"] . ". <br><br>";
}else {
    echo "Invalid username or password";
}

// Unset all session variables
session_unset();

// Destroy the session completely
session_destroy();
echo "Session has been destroyed. <br><br>";


// Working with cookies

// Creating cookies
/* Syntax
setcookie(name, value, expire, path, domain, secure, httponly);
Only the name parameter is required. All other are optional
Must Appear BEFORE HTML tag
*/
setcookie("user", "John Doe", time() + (86400 * 30), "/");
/*
"user" is the name of cookie
"John Doe" is the value of the cookie
cookie expire after 30 day, "(86400*30)"
path "/" means the cookie is available in entire website
*/

echo "Cookie has been set! <br><br>";


// Check if cookie is set
if (isset($_COOKIE["user"])) {
    $user = $_COOKIE["user"];
    echo "Welcome back, $user! <br><br>"; //output: Welcome back, John Doe
} else {
    echo "Cookie not set yet. Please reload the page.";
}

// Delete a Cookie (set the expiration date)
setcookie("user", "", time() - 3600); // set the expiration date to 1 hour ago
echo "Cookie 'user' is deleted <br><br>";

// Check if Cookies are Enabled
if(count($_COOKIE) > 0) {
  echo "Cookies are enabled.";
} else {
  echo "Cookies are disabled.";
}
echo "<br><br>";


// Class, Method, Inheritance and Polymorphism
// Parent class
class Car{ //create a class
    public $brand;
    public $model;
    private $price;
    public $color;
    #public means can access from anywhere
    # private means only can be accessed within the  class they declared

    // Constructor - automatically called when object is created
    public function __construct($brand, $model, $price, $color){
        $this->brand = $brand; // means that assigning the value $brand to the object's brand property/attributes
        $this->model = $model;
        $this->price = $price;
        $this->color = $color;
    }

    // Getter for the private property
    // $price is a private property, therefore you need this to access price
    public function getPrice(){
        return $this->price;
    }

    // Static property
    // can be used across all instances of class without creating object of the class
    public static $discount = 5000;

    // Static method
    // this method is belong to class itself
    public static function applyDiscount($amount){
        return $amount - self::$discount; //self:: refer to static properties itself
    }
}

// Child class inheriting from Car (Inheritance)
class LuxuryCar extends Car {
    public $luxuryFeature; // add luxury feature properties

    // Constructor (Polymorphism - method overriding to add luxuryfeature)
    public function __construct($brand, $model, $price, $color, $luxuryFeature){
        parent::__construct($brand, $model, $price, $color); // Call parent constructor
        $this->luxuryFeature = $luxuryFeature;
    }
}

// Instantiate Car object
$car = new Car("Toyota", "Camry", 250000, "Red");
echo "Brand: " . $car->brand . "<br>";
echo "Model: " . $car->model . "<br>";
echo "Color: " . $car->color . "<br>";
echo "Original Price: " . $car->getPrice() . "<br>";
echo "Price after discount: " . Car::applyDiscount($car->getPrice()) . "<br><br>";

// Instantiate LuxuryCar object
$luxuryCar = new LuxuryCar("BMW", "X7", 500000, "Black", "Premium Sound System");
echo "Brand: " . $luxuryCar->brand . "<br>";
echo "Model: " . $luxuryCar->model . "<br>";
echo "Color: " . $luxuryCar->color . "<br>";
echo "Luxury Feature: " . $luxuryCar->luxuryFeature . "<br>";
echo "Original Price: " . $luxuryCar->getPrice() . "<br>";
echo "Price after discount: " . Car::applyDiscount($luxuryCar->getPrice()) . "<br><br>";


?>
