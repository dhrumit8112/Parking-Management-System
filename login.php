<?php
$showAlert = false;
$showError = false;
$login = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "partials/dbconnect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "Select * from users where username='$username' AND password='$password';";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        if ($username == "admin") {
            header("location: display.php");
        } else {
            header("location: EnteringForm.php");
        }
    } else {
        $showError = "Invalid Credentials";
    }
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
    <?php require 'partials/navbar.php' ?>
    <img src="./img.jpg" class="image">
    <?php
    if ($login) {
        echo "You are logged in";
    } else {
        // echo "<script>alert('".$showError."')</script>";
        echo $showError;
    }
    ?>
    <fieldset>
        <legend>
            <h1>Parking Managment System</h1>
        </legend>
        <form action="/Parking/login.php" method="POST" id='form1'>
            <table>
                <tr>
                    <td>
                        <label for="username">username</label>
                    </td>
                    <td>
                        <input type="text" id="username" name="username"><br>
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
                    <td colspan="2">
                        <input type="submit" value="Submit">
                    </td>
                </tr>
        </form>
    </fieldset>
</body>

</html>