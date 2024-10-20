<?php

// Creating and calling a function
function greet(){
    echo "Hello, Welcome to our PHP program Functions & Array Part ! <br>";

}

greet();
echo "<br>";

// Function with arguments and return values

function add($a, $b, $c){ //arguments is place within the ()
    $sum = $a + $b + $c;
    return $sum; //return the number of sum
}

$result = add(33,34,32); // calling the function
echo "The sum of 33, 34 and 32 is : $result <br>";
echo "<br>";

/*
Array - special variable that can hold many values under a single variable
Type of Array:
Indexed - arrays with numeric index
Associative - arays with named keys
Multidimensional - nested array (containing one or more array)
*/

// Create & Accessing array
// indexed array
$fruits = array("Apple", "Banana", "Blueberry");
$fruits = ["Apple", "Banana", "Blueberry"]; // both are the same

echo "First Fruit: $fruits[0] <br>"; //index start from 0
echo "Second Fruit: $fruits[1] <br>";
echo "Third Fruit: $fruits[2] <br>";
echo "<br>";

// associative array
$ages = ["Alice" => 25, "Bob" => 30, "Tom"=> 21];
$ages = array("Alice" => 25, "Bob" => 30, "Tom"=> 21); // both the same

echo "Alice is: ". $ages["Alice"]. " years old. <br>";
echo "Bob is: ". $ages["Bob"]. " years old. <br>";
echo "Tom is: ". $ages["Tom"]. "years old. <br>";
echo "<br>";

// Array functions and operations
// Adding elements to array - array_push()
array_push($fruits, "Orange");
print_r($fruits);
echo "<br>";

// Removing the last element array_pop()
array_pop($fruits);
print_r($fruits);
echo "<br>";

// Merging array array_merge()
$fruit1 = ["Apple", "Banana", "Blueberry"];
$fruit2 = ["Strawberry", "Kiwi", "Cherry"];
$mergedfruit = array_merge($fruit1, $fruit2);
print_r($mergedfruit);
echo "<br>";

// Sorting array
sort($mergedfruit); //sort arrays in ascending order
print_r($mergedfruit);
echo "<br>";

rsort($mergedfruit); //sort arrays in descending order
print_r($mergedfruit);
echo "<br><br>";

# full array functions and operations
# https://www.w3schools.com/php/php_ref_array.asp

?>
