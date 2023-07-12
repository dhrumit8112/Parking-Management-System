<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
}
else
{
    $loggedin = false;
}
echo 
'<style>
    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: #111;
}

.active {
    background-color: #04AA6D;
}
</style>

<nav>
    <ul>
        <li><a class="active" href="/Parking/index.php">Home</a></li>';
        if(!$loggedin){echo '
        <li><a href="/Parking/login.php">Login</a></li>
        <li><a href="/Parking/signup.php">SignUp</a></li>';
        }
        else{echo '
            <li><a href="/Parking/logout.php">Logout</a></li>';
        }
        echo '
    </ul>
    </ul>
</nav>';
?>