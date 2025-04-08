<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "image_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $imageName = $_FILES['image']['name']; // Get file name
    $imageType = $_FILES['image']['type']; // Get MIME type
    $imageData = file_get_contents($_FILES['image']['tmp_name']); // Get binary data

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO images (image_name, image_type, image_data) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $imageName, $imageType, $imageData);

    // Execute and check result
    if ($stmt->execute()) {
        echo "Image uploaded successfully!";
        echo '<br><a href="view.php">View Images</a>';
    } else {
        echo "Failed to upload image: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
