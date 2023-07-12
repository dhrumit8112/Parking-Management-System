<?php
$showAlert = false;
$showError = false;
$showError1 = false;
$username = "";
$email = "";
$password = "";
$cpassword = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "partials/dbconnect.php";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    // $exists = false;
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $exists = true;
    } else {
        $exists = false;
    }

    if ($password == $cpassword) {
        if ($exists == false) {
            session_start();
            $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = true;
        }
    } else {
        $showError1 = true;
    }
}

?>



<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SignUp Page</title>
        <link rel="stylesheet" href="all.css">
        
    </head>
    
    <body>
        
        <img src="./img.jpg" class="image" alt="">
        <?php require 'partials/navbar.php' ?>
        <?php
    if ($showAlert) {
        echo "<script>alert('Successfully user created.\\nYou are required to login now.')</script>";
    }
    if ($showError) {
        echo "<script>alert('Username already exists!!')</script>";
    }
    if ($showError1) {
        echo "<script>alert('Password donot match')</script>";
    }
    ?>
    <fieldset>
        <legend>
            <h1>Parking Managment System</h1>
        </legend>
        <form action="/Parking/signup.php" method="POST" id='form1'>
            <table>
                <tr>
                    <td>
                        <label for="username">Username</label>
                    </td>
                    <td>
                        <input type="text" id="username" name="username"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email</label>
                    </td>
                    <td>
                        <input type="email" id="email" name="email"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password</label>
                    </td>
                    <td>
                        <input type="password" id="password" name="password"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cpassword">Confirm password</label>
                    </td>
                    <td>
                        <input type="password" id="cpassword" name="cpassword"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Submit">
                        <!-- <input type="submit" value="Submit" onclick="validate()"> -->
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
<!-- <script type= "text/javascript" src="signup.js"></script> -->

</html>
