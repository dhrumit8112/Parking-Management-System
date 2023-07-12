<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "partials/dbconnect.php";
    $username = $_POST["username"];
    $NumberPlate = $_POST["NumberPlate"];
    $sql3 = "SELECT `id` FROM `currentlyin` WHERE username = '$username' AND NumberPlate = '$NumberPlate';";
    $result4 = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($result4);

    if ($row) {
        $output = implode(" ", $row);
        $sqlu = "DELETE FROM `currentlyin` WHERE id=$output;";
        $result2 = mysqli_query($conn, $sqlu);
        $sql1 = "UPDATE `allcars` SET `LeavingDateTime`= CURRENT_TIMESTAMP WHERE id = $output";
        $result1 = mysqli_query($conn, $sql1);
        echo "<script>alert('Successfull')</script>";
    } else {
        echo "<script>alert('No car exists')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaving Form</title>
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
        <form action="/Parking/LeaveForm.php" method="POST">
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
                        <label for="NumberPlate">Number Plate</label>
                    </td>
                    <td>
                        <input type="text" id="NumberPlate" name="NumberPlate"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
    <a href="/Parking/EnteringForm.php">Entering Form</a>
    <script src="EnteringForm.js"></script>

</body>

</html>