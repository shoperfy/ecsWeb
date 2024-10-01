<?php
// login.php

session_start();


// Database connection details
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myWebsite";

// Create a new MySQLi object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare the SQL statement
    //$sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $sql = $conn->prepare("INSERT INTO `users` (`email`, `password`) VALUES (?, ?)");
    $sql->bind_param("ss", $email, $password);
    $sql->execute();
    $sql->close();

    header("Location: /werbsite/html/login.html");
    exit();

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register in</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/werbsite/css/reset.css">
    <link rel="stylesheet" href="/werbsite/css/login.css">

</head>

<body>

    <header>
        <div class="head">
            <img src="/werbsite/images/iso10.gif" alt="dodeca">
            <a href="#" id="home">Brendon<b>Janku</b></a>
            <nav>
                <ul>
                    <li><a href="/werbsite/php/index.php">About</a></li>
                    <li><a href="/werbsite/html/projects.html">Projects</a></li>
                    <li><a href="#">CV</a></li>
                    <li><a href="/werbsite/html/login.html">Login</a></li>
                    <li><a href="/werbsite/php/addPost.php">Add Post</a></li>
                    <li><a href="/werbsite/php/viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <main>

        <div class="login">

            <form action="/werbsite/php/register.php" method="post">
                <h1>Log in</h1>

                <input type="email" id="username" name="email" placeholder="Email" required>

                <input type="password" id="password" name="password" placeholder="Password" required>

                <input type="submit" id="loginButton" value="Register">

                <p id="register">Have an account?&nbsp;<a href="/werbsite/html/login.html"> Log in</a></p>

            </form>
        </div>

    </main>



    <footer>

        <div class="foot">
            <p>&copy; Made with &Lt;3 by Brendon Janku</p>
        </div>
    </footer>

</body>

</html>