<?php
include 'db.php';

// Check if user is logged in
if (!isset($_COOKIE["user"])) {
    header("Location: index.php");
    exit();
}

// Insert Data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    $conn->query($sql);
}

// Delete Data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}

// Fetch Data
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Welcome, <?php echo $_COOKIE["user"]; ?>! <a href="logout.php">Logout</a></h2>

    <h2>Add User</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" required>
        Email: <input type="email" name="email" required>
        <input type="submit" name="add" value="Add User">
    </form>

    <h2>Users List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this user?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>

<?php $conn->close(); ?>
