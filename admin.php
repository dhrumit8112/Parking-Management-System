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
    <title>Display</title>
    <link rel="stylesheet" href="tablecss.css">
</head>

<body>
    <?php require 'partials/navbar.php' ?>
    <img src="./img.jpg" class="image">

    <h1>Click on the button to see the database!</h1>

    <form action="display.php" method="POST">
        <input type="submit">
    </form>
</body>

</html>