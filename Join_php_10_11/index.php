<?php
include 'db.php';

// INNER JOIN: Fetch users and their orders
$innerJoinQuery = "SELECT users.id, users.name, users.email, orders.product_name, orders.amount 
                   FROM users INNER JOIN orders ON users.id = orders.user_id";
$innerJoinResult = $conn->query($innerJoinQuery);

// LEFT JOIN: Fetch all users, even if they haven't placed orders
$leftJoinQuery = "SELECT users.id, users.name, users.email, orders.product_name, orders.amount 
                  FROM users LEFT JOIN orders ON users.id = orders.user_id";
$leftJoinResult = $conn->query($leftJoinQuery);

// RIGHT JOIN: Fetch all orders, even if they have no matching users
$rightJoinQuery = "SELECT users.id, users.name, users.email, orders.product_name, orders.amount 
                   FROM users RIGHT JOIN orders ON users.id = orders.user_id";
$rightJoinResult = $conn->query($rightJoinQuery);

// FULL OUTER JOIN: (Using UNION because MySQL does not support FULL OUTER JOIN)
$fullJoinQuery = "SELECT users.id, users.name, users.email, orders.product_name, orders.amount 
                  FROM users LEFT JOIN orders ON users.id = orders.user_id
                  UNION
                  SELECT users.id, users.name, users.email, orders.product_name, orders.amount 
                  FROM users RIGHT JOIN orders ON users.id = orders.user_id";
$fullJoinResult = $conn->query($fullJoinQuery);

?>

<!DOCTYPE html>
<html>
<head>
    <title>MySQL JOIN Operations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>INNER JOIN (Users with Orders)</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Product</th><th>Amount</th></tr>
        <?php while ($row = $innerJoinResult->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['product_name']; ?></td>
            <td><?= $row['amount']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <h2>LEFT JOIN (All Users, with or without Orders)</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Product</th><th>Amount</th></tr>
        <?php while ($row = $leftJoinResult->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['product_name'] ?: 'No Order'; ?></td>
            <td><?= $row['amount'] ?: 'N/A'; ?></td>
        </tr>
        <?php } ?>
    </table>

    <h2>RIGHT JOIN (All Orders, with or without Users)</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Product</th><th>Amount</th></tr>
        <?php while ($row = $rightJoinResult->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?: 'No User'; ?></td>
            <td><?= $row['name'] ?: 'N/A'; ?></td>
            <td><?= $row['email'] ?: 'N/A'; ?></td>
            <td><?= $row['product_name']; ?></td>
            <td><?= $row['amount']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <h2>FULL OUTER JOIN (All Users and Orders)</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Product</th><th>Amount</th></tr>
        <?php while ($row = $fullJoinResult->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?: 'No User'; ?></td>
            <td><?= $row['name'] ?: 'N/A'; ?></td>
            <td><?= $row['email'] ?: 'N/A'; ?></td>
            <td><?= $row['product_name'] ?: 'No Order'; ?></td>
            <td><?= $row['amount'] ?: 'N/A'; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>

<?php $conn->close(); ?>
