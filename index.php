<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Managment System</title>
    <link rel="stylesheet" href="all.css">
</head>

<body>
    <img src="./img.jpg" class="image" style="opacity: 50%;">
    <?php require 'partials/navbar.php' ?>
    <h1>Parking Managment System</h1>
    <h1>Welcome!!</h1>
</body>

</html>