<?php
#  single comment line
// single comment line
/* multi comment line */

/*
To make it easy for me to identify the output:
# will be use for no output
// will be use when output available
*/


# setting up variable
$greeting = "Hello";
$name = $name2 = "User"; //assign the same value to multiple variable
$age = 15;



// print
echo $greeting. ", ". $name. "!". "<br>"; // <br> line break
print $greeting. ", ". $name2. "!". "<br><br>";

# data type
# string, int, float(double), boolean, array, object, null, resource

// Get the data type
var_dump($age); // return the date type and value
echo "<br><br>";

# Some useful method for string
// string length
echo strlen($name), "<br>";

// word count
echo str_word_count($name), "<br>";

// search for text within string
echo strpos ("Hello World!", "World"), "<br>"; //output: 6

// upper and lower case
$a = "Testing";
echo strtoupper($a), "<br>";
echo strtolower($a), "<br>";

// replace string
echo str_replace("Testing", "No Testing", $a), "<br>";

// reverse a string
echo strrev($a), "<br>";

// remove white space
echo trim("  Hello World!  "), "<br>";

// convert string into array (explode)
$x = "Hello World!";
$y = explode(" ", $x);
print_r($y);
echo "<br>";

// string concatenation
$z = $x . " " . $a;
echo $z, "<br><br>";

// slicing string
echo substr($x, 6, 5), "<br>"; //slice at index 6 and end at 5 position later output: World
echo substr($x, 6), "<br>"; // slice till end output: World!
echo substr($x, -5, 3), "<br>"; //slice from end and last character has index -1  output: orl
echo substr($x, 6, -3), "<br><br>"; //output: Wor

# full string functions and operations
# https://www.w3schools.com/php/php_ref_string.asp


#scope
# local scope: variable declared within a function and only can be used insde the function (use the word "static" to keep the variable)
# global scope: variable declared outside and not able to accessed within function (unless use the word "global")

// setting a constant variable (cannot be changed, global variable)
// define(variable name, value) or use const
// const cannot use inside block scope, define can
const welcome = "Hello, How are you";
define ("welcome2", "Hello, How are you");
echo welcome, "<br>";
echo welcome2, "<br><br>";

// math
echo (pi()), "<br>"; // return value of pi
echo (min(0, 150, 30, 20, -8, -200)), "<br>"; // find lowest value
echo (max(0, 150, 30, 20, -8, -200)), "<br>"; // find highest value
echo (abs(-6.5)), "<br>"; // return absolute (positive) value of a number
echo (sqrt(64)), "<br>"; // return the square root of a number
echo (round(0.61)), "<br>"; // return the floating point number to nearest integer
echo (rand()), "<br><br>"; //return a random number

# full math functions and operations
# https://www.w3schools.com/php/php_ref_math.asp

/*
Arithmetic/Assignment Operator
+ addition
- subtraction
* multiplication
/ division
% modulus
** exponentiation

Comparison Operator
== equal
=== identical
!= or <> not equal
!== not identical
> greater
< lesser
>= greater than
<= less than
<=> spaceship (return an integer less than, equal to, or greather than)

logical operator
and &&
or ||
xor
! not

string operator
. concetenation
.= concatenation assignment $t1 .= $t2 append t2 to t1

*/

// if statement
$grade = "B";
if ($grade == "A"){
    echo "Excellent!";
} elseif ($grade == "B"){
    echo "Good Job!";
}else {
    echo "Keep working hard!";
}
echo "<br><br>";

// switch statement, keyword "break"
$day = "Sunday";
switch ($day){
    case "monday":
    echo "Start of the Week.";
    break; // stop the execution of more code, no more cases are tested

    case "Saturday":
    echo "End of the Week.";
    break;

    default: // run the code if there is no case match
    echo "Enjoy your day!";
}
echo "<br><br>";

// for loop, break, continue
for ($i = 1; $i <= 5; $i++) {
    echo "Number: ". $i . "<br>";
}
echo "<br>";

for ($i = 0; $i <= 10; $i++) {
  if ($i == 3) break; // stop the loop even if the condition is still true
  echo "The number is: $i <br>";
}
echo "<br>";

for ($i = 0; $i <= 6; $i++) {
  if ($i == 3) continue; // stop the current iteration and continue with next
  echo "The number is: $i <br>";
}
echo "<br>";

// while loop
$c = 1;

while ($c <= 5){
    echo"The number is : $c <br>";
    $c ++;
}
echo "<br>";

// do while loop -execute the loop at least once, continue to loop as long as the condition is true
$d = 1;
do {
    echo "The number is : $d <br>";  // this will executed at least once
    $d ++;
}while ($d <= 4);
echo "<br>";

// foreach loop
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $e) {
  echo "The color is : $e <br>";
}
echo "<br>";

?>
