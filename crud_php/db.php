<?php
$host = "localhost";
$user = "root";  
$pass = "";      
$dbname = "crud_db";

// create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
