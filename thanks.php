<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "partials/dbconnect.php";
    $username = $_POST["username"];
    $CarCompanyName = $_POST["CarCompanyName"];
    $OwnerName = $_POST["OwnerName"];
    $NumberPlate = $_POST["NumberPlate"];
    $MobileNumber = $_POST["MobileNumber"];
    $sql = "INSERT INTO `currentlyin` (`username`, `CarCompanyName`, `OwnerName`, `NumberPlate`, `MobileNumber`) VALUES ($username, $CarCompanyName, $OwnerName, $NumberPlate, $MobileNumber)";
    $sql1 = "INSERT INTO `allcars` (`username`, `CarCompanyName`, `OwnerName`, `NumberPlate`, `MobileNumber`) VALUES ($username, $CarCompanyName, $OwnerName, $NumberPlate, $MobileNumber)";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $sql2 = "SELECT * FROM `allcars`";
    $result3 = mysqli_query($conn, $sql2);
    $num = mysqli_num_rows($result3);
    $sql3 = "SELECT `EnteringDateTime` FROM `currentlyin` WHERE id = $num;";
    $result4 = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($result4);
    $output = implode(" ", $row);
    $sqlu = "UPDATE `allcars` SET `EnteringDateTime`='$output' WHERE id = $num;";
    $result2 = mysqli_query($conn, $sqlu);
}

?>

<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "partials/dbconnect.php";
    $username = $_POST["username"];
    $NumberPlate = $_POST["NumberPlate"];
    $sql = "DELETE FROM `currentlyin` WHERE username = '$username' AND NumberPlate = '$NumberPlate'";
    $result = mysqli_query($conn, $sql);
    $sql2 = "SELECT id FROM `allcars` WHERE username = '$username' AND NumberPlate = '$NumberPlate'";
    $result3 = mysqli_query($conn, $sql2);
    $num = mysqli_fetch_assoc($result3);
    $n = $num['id'];
    // echo var_dump($n);
    // $dt = date("Y-m-d H:i:s");
    $sql1 = "UPDATE `allcars` SET `LeavingDateTime`=CURRENT_TIMESTAMP WHERE id = $n";
    $result1 = mysqli_query($conn, $sql1);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="all.css">
</head>

<body>
    <img src="./img.jpg" class="image">
    <?php require 'partials/navbar.php' ?>
    <h1>Thank You for visiting!!</h1>
    <h1>See You Again!!</h1>
</body>

</html>