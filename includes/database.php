<?php
session_start();
$dsn="localhost";
$dbusername= "root";
$dbpass= "";
$dbname="murtuarydb";

// Create a connection
$conn = new mysqli($dsn, $dbusername, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment the following line if you want to set character encoding (optional)
// $conn->set_charset("utf8");

// You can now use the $conn object for database queries
  //$result = $conn->query("SELECT * FROM corpses");
 // echo"". $result->num_rows ."";

// Remember to close the connection when done
// $conn->close();

