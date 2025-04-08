<?php
setcookie("user", "", time() - 3600, "/"); // Expire cookie
header("Location: index.php");
exit();
?>
