<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_email"])) {
    // User is not logged in, redirect to login.html
    header("Location: /werbsite/html/login.html");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    if ($action === "Preview") {
        // Generate the formatted date
        $timestamp = time();
        $formattedDate = date("jS F Y, G:i", $timestamp) . ' UTC';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blog</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/werbsite/css/reset.css">

    <link rel="stylesheet" href="/werbsite/css/preview.css">

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
            <h1>Preview</h1>
            <article class="posts">
                <section class="post">
                    <p class="date"><?= $formattedDate ?></p>
                    <h2><?php echo $title ?></h2>
                    <p><?php echo $content ?></p>
                </section>
            </article>
            <div class="navigation">
                <a href="/werbsite/php/addPost.php?title=<?= urlencode($title) ?>&content=<?= urlencode($content) ?>" class="edit">Edit</a>
                <form action="/werbsite/php/addEntry.php" method="post">
                    <input type="hidden" name="title" value="<?= $title ?>">
                    <input type="hidden" name="content" value="<?= $content ?>">
                    <input type="hidden" name="date" value="<?= $formattedDate ?>">
                    <input type="submit" name="action" value="Post">
                </form>
            </div>
        </main>
    </body>
</html>

<?php
        exit();
    
    } elseif ($action === "Post") {
        // Handle the post submission
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
        // Invalid action, redirect to addPost.php
        header("Location: /werbsite/php/addPost.php");
        exit();
    }
}
?>