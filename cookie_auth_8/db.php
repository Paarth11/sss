<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookie_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!-- INSERT INTO users (name, email, username, password) VALUES 
('Admin', 'admin@example.com', 'admin', 'admin123'); -->
