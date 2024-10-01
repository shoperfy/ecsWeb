<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_email"])) {
  // User is not logged in, redirect to login.html
  header("Location: /werbsite/html/login.html");
  exit();
}

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
  // Get the title and content from the form
  $title = $_POST["title"];
  $content = $_POST["content"];
  $action = $_POST["action"];

  if ($action === "Post") {
    // Get the current date and format it
    $timestamp = time();
    $formattedDate = date("jS F Y, G:i", $timestamp) . ' UTC';

    // Prepare the SQL statement
    $sql = $conn->prepare("INSERT INTO blogPosts (title, description, dateTime) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $title, $content, $formattedDate);

    // Execute the statement
    if ($sql->execute()) {
      // Post added successfully, redirect to viewBlog.php
      header("Location: /werbsite/php/viewBlog.php");
      exit();
  }
  } else {
    // Error occurred while adding the post
    $error = "Error: " . $sql->error;
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
  <title>Add post</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/werbsite/css/reset.css">

  <link rel="stylesheet" href="/werbsite/css/addEntry.css">

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
    <h1>Post Submitted</h1>
  </main>

  <footer>
    <div class="foot">
      <p>&copy; Made with &Lt;3 by Brendon Janku</p>
    </div>
  </footer>

</body>

</html>