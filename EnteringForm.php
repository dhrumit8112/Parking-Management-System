<?php

session_start();

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

    $checksql = "SELECT * FROM `currentlyin` WHERE `NumberPlate`='$NumberPlate'";
    $re = mysqli_query($conn, $checksql);
    $check = mysqli_num_rows($re);

    if ($check == 0) {
        $sql = "INSERT INTO `currentlyin` (`username`, `CarCompanyName`, `OwnerName`, `NumberPlate`, `MobileNumber`) VALUES ('$username', '$CarCompanyName', '$OwnerName', '$NumberPlate', '$MobileNumber')";
        $sql1 = "INSERT INTO `allcars` (`username`, `CarCompanyName`, `OwnerName`, `NumberPlate`, `MobileNumber`) VALUES ('$username', '$CarCompanyName', '$OwnerName', '$NumberPlate', '$MobileNumber')";
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
        echo "<script>alert('Successfull')</script>";
    } else {
        echo "<script>alert('Car already in')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entering Form</title>
    <link rel="stylesheet" href="all.css">
</head>

<body>
    <img src="./img.jpg" class="image">
    <?php require 'partials/navbar.php' ?>
    <fieldset>
        <legend>
            <h1>Parking Managment System</h1>
        </legend>
        <h1>Welcome - <?php echo $_SESSION['username'] ?></h1>
        <form name="f1" action="/Parking/EnteringForm.php" method="POST">
            <table>
                <tr>
                    <td>
                        <label for="username">username</label>
                    </td>
                    <td>
                        <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="CarCompanyName">Car Company Name</label>
                    </td>
                    <td>
                        <input type="text" id="CarCompanyName" name="CarCompanyName"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="OwnerName">Owner Name</label>
                    </td>
                    <td>
                        <input type="text" id="OwnerName" name="OwnerName"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="NumberPlate">Number Plate</label>
                    </td>
                    <td>
                        <input type="text" id="NumberPlate" name="NumberPlate"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="MobileNumber">Mobile Number</label>
                    </td>
                    <td>
                        <input type="text" id="MobileNumber" name="MobileNumber"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Submit">
                        <!-- <input type="submit" value="Submit" onsubmit="validate()"> -->
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
    <a href="/Parking/LeaveForm.php">Leave Form</a>
    <!-- <script src="EnteringForm.js"></script> -->
</body>

</html>