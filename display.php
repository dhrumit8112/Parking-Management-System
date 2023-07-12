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
    <?php require 'partials/adminnavbar.php' ?>
    <img src="./img.jpg" class="image">
    <table class="dtable">
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>CarCompanyName</th>
            <th>OwnerName</th>
            <th>NumberPlate</th>
            <th>EnteringDateTime</th>
            <th>LeavingDateTime</th>
        </tr>
        <?php
        include "partials/dbconnect.php";
        // echo "hello";
        $sql = "SELECT * FROM `allcars`";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        // echo var_dump($num);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // $row = mysqli_fetch_assoc($result);
                echo "<tr><td>" . $row['id'] . "</td><td>"  . $row['username'] . "</td><td>" . $row['CarCompanyName'] . "</td><td>" . $row['OwnerName'] . "</td><td>" . $row['NumberPlate'] . "</td><td>" . $row['EnteringDateTime'] . "</td><td>" . $row['LeavingDateTime'] . "</td></tr>";
            }
        }
        ?>
    </table>
</body>

</html>