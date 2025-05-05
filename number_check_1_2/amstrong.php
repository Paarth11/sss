<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armstrong Number Check</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Check Armstrong Number</h2>
        <form method="POST">
            <input type="number" name="number" placeholder="Enter a number" required>
            <button type="submit">Check</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num = $_POST['number'];
            $sum = 0;
            $temp = $num;
            $n = strlen((string)$num);

            while ($temp > 0) {
                $digit = $temp % 10;
                $sum += pow($digit, $n);
                $temp = (int)($temp / 10);
            }

            echo "<p class='result'>";
            if ($sum == $num) {
                echo "$num is an Armstrong Number!";
            } else {
                echo "$num is NOT an Armstrong Number!";
            }
            echo "</p>";
        }
        ?>
    </div>
</body>
</html>