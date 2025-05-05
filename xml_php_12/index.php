<?php
// Load XML file
$xml = simplexml_load_file("data.xml") or die("Error: Cannot load XML file.");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display XML Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Employee List (from XML)</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
        </tr>
        <?php foreach ($xml->employee as $emp) { ?>
        <tr>
            <td><?= $emp->id; ?></td>
            <td><?= $emp->name; ?></td>
            <td><?= $emp->email; ?></td>
            <td><?= $emp->position; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
