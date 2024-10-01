<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_email"])) {
    // User is not logged in, redirect to login.html
    header("Location: /werbsite/html/login.html");
    exit();
}


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
    <link rel="stylesheet" href="/werbsite/css/addPost.css">

    <script src="/werbsite/js/addPost.js" defer></script>

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
        <div class="post">
            <form action="/werbsite/php/addEntry.php" method="post" id="postForm">

                <h1>Add post</h1>

                <input type="text" id="title" name="title" placeholder="Title">

                <textarea id="content" name="content" placeholder="Yip yap yop this is a blog..."></textarea>

                <div class="buttons">
                    <input type="submit" value="Post">
                    <button type="button" id="clear">Clear Form</button>
                </div>
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