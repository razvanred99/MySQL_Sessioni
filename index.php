<?php
session_start();
?>

<!doctype html>

<html lang="en">

<head>
    <title>HomePage</title>
    <meta charset="utf-8"/>
</head>

<body>

<?php

if (isset($_SESSION['user'])) {
    echo "Ciao " . $_SESSION['user'];
} else header("Location: login.php");
?>

<a href="logout.php">Logout</a>

</body>

</html>
