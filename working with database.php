<?php
// This code is just for display purpose, not suitable to execute
//Connection to MySQL

$servername = "localhost";
$username = "username";
$password = "password";

//MySQLi (Object-Oriented)
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error); // terminate the script
}
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE myDB"; //sql query
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

// close connection
$conn->close();


// connect to MySQLi(Procedural)
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE myDB"; //sql query
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}


// close connection
mysqli_close($conn);

// more about MySQLi function: https://www.w3schools.com/php/php_ref_mysqli.asp

?>
