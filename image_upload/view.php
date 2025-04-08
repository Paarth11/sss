<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "image_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch images from database
$sql = "SELECT id, image_name, image_type, image_data FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . htmlspecialchars($row['image_name']) . "</h3>";
        echo '<img src="data:' . $row['image_type'] . ';base64,' . base64_encode($row['image_data']) . '" width="300"><br>';
    }
} else {
    echo "No images found.";
}

$conn->close();
?>
