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
    $sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows == 1) {
        // User exists, verify the password
        $user = $result->fetch_assoc();
        if ($password === $user["password"]) {
            // Login successful, set session variables and redirect to addPost
            $_SESSION["user_email"] = $user["email"];
            header("Location: /werbsite/php/addPost.php");
            exit();
        } else {
            // Invalid password
            $error = "Invalid email or password.";
        }
    } else {
        // User does not exist
        $error = "Invalid email or password.";
    }

    $sql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=/werbsite/html/login.html">
    <title>Invalid login</title>

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
                    <li><a href="/werbsite/php/projects.php">Projects</a></li>
                    <li><a href="#">CV</a></li>
                    <li><a href="/werbsite/php/logout.php">Logout</a></li>
                    <li><a href="/werbsite/php/addPost.php">Add Post</a></li>
                    <li><a href="/werbsite/php/viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <?php
        if (isset($error)) {
            echo "<h1>$error</h1>";
            echo "<h1>You will be redirected back to the login page in 3 seconds...</h1>";
        }
        ?>
    </main>

    <footer>
        <div class="foot">
            <p>&copy; Made with &Lt;3 by Brendon Janku</p>
        </div>
    </footer>

</body>

</html>