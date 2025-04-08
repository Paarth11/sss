<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <h2>Upload an Image</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <br><br>
        <input type="submit" name="submit" value="Upload Image">
    </form>
    <br>
    <a href="view.php">View Uploaded Images</a>
</body>
</html>
