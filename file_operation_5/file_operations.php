<?php

$filename = "sample.txt"; // File to be created

// 1. Create and Write to a File
$file = fopen($filename, "w"); // Open file in write mode
if ($file) {
    fwrite($file, "Hello, this is a sample file.\n");
    fwrite($file, "This file demonstrates PHP file handling.\n");
    fclose($file);
    echo "File created and written successfully.<br>";
} else {
    echo "Error creating file.<br>";
}

// 2. Read from the File
if (file_exists($filename)) {
    $file = fopen($filename, "r"); // Open file in read mode
    echo "<h3>File Contents:</h3><pre>" . fread($file, filesize($filename)) . "</pre>";
    fclose($file);
} else {
    echo "File does not exist.<br>";
}

// 3. Append Data to the File
$file = fopen($filename, "a"); // Open file in append mode
if ($file) {
    fwrite($file, "Appending new data to the file.\n");
    fclose($file);
    echo "Data appended successfully.<br>";
} else {
    echo "Error appending to file.<br>";
}

// 4. Delete the File
if (file_exists($filename)) {
    unlink($filename); // Delete the file
    echo "File deleted successfully.<br>";
} else {
    echo "File already deleted or does not exist.<br>";
}

?>
