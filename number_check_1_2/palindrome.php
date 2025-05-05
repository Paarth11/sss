<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome Number Check</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Reverse & Check Palindrome</h2>
        <form method="POST">
            <input type="number" name="number" placeholder="Enter an integer" required>
            <button type="submit">Check</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num = $_POST['number'];
            $revNum = strrev($num);

            echo "<p class='result'>";
            echo "Reverse of $num is $revNum<br>";
            if ($num == $revNum) {
                echo "$num is a Palindrome!";
            } else {
                echo "$num is NOT a Palindrome!";
            }
            echo "</p>";
        }
        ?>
    </div>
</body>
</html>