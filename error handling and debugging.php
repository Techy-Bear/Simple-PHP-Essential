<?php

// Try, Catch, And Finally
function divide($numerator, $denominator){
    try{ // create code that may cause an exception
        if ($denominator == 0){
            // create an exception that include a message and is passed to catch block
            throw new Exception("Division by zero <br>");
        }
        return $numerator / $denominator; // run this if no exception
    } catch (Exception $e){ //catches exception that was thrown and keep as variable $e
        echo "Error: " . $e -> getMessage(); // retrives the message from the exception object
    }finally{ // will always executed regardless of whether exception was thrown or not
        echo "Cleanning up ... <br>";
    }
}

echo divide(10, 2) . "<br><br>";
echo divide(10, 0) . "<br><br>";


// Custom error handlers
function customError($errno, $errstr) {
  echo "Error: [$errno] $errstr";
}

//set error handler
set_error_handler("customError"); // specify a function to handle error
// In this case, customError functions will be executed if error occur

//trigger error
echo($test); // variable test is not define
// output: Error: [8] Undefined variable: test

// more about error functions: https://www.w3schools.com/php/php_ref_error.asp
echo "<br><br>";

// using var_dump, print_r
$number = 40;
$string = "Hello World";
$array = array(1,2,3);
$array2 = ["name" => "Smith", "email" => "smith@gmail.com", "age" => 25];

// var_dump: dump information about different variables
echo "Using var_dump: <br>";
var_dump($number);
echo "<br>";
var_dump($string);
echo "<br>";
var_dump($array);
echo "<br>";
var_dump($array2);
echo "<br><br>";

//print_r print information about some variables in more readable way
print_r($array2);
echo "<br><br>";

//implementing logging mechanisms
$filename = "non_existing_file.txt";
$file = fopen($filename, "r");

// If file can't be opened, log an error
if (! $file) {
    // Log an error message to the server's default log file
    error_log("Error: Could not open file '$filename'", 0); // Default type 0 logs to system
    echo "<br><br>";
    echo "File not found. Check the error log.";
    echo "<br>";
}

?>
