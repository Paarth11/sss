<?php
session_start();

// Static array of users
$users = [
    "admin" => "password123",
    "user1" => "pass123",
    "user2" => "welcome"
];

// Get input values
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($users[$username]) && $users[$username] === $password) {
    $_SESSION['username'] = $username; // Set session
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: index.php?error=Invalid credentials");
    exit();
}
?>


