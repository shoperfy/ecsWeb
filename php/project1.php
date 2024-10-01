<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
        
    <link rel="stylesheet" href="/werbsite/css/reset.css">
    <link rel="stylesheet" href="/werbsite/css/project1.css">

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
                    <?php
                        session_start();
                        if (isset($_SESSION["user_email"])) {
                        // User is logged in, display "Logout" link
                            echo '<li><a href="/werbsite/php/logout.php">Logout</a></li>';
                        } else {
                            // User is not logged in, display "Login" link
                            echo '<li><a href="/werbsite/html/login.html">Login</a></li>';
                        }
                    ?>
                    <li><a href="/werbsite/php/addPost.php">Add Post</a></li>
                    <li><a href="/werbsite/php/viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <main>

        <figure id="back">
            <img src="/werbsite/images/back.svg" alt="dodeca">
            <figcaption><a href="/werbsite/php/projects.php">Back</a></figcaption>
        </figure>


        <article class="project">

            <h1>This website</h1>

            <figure>
                <img src="/werbsite/images/website.png" alt="website">
            </figure>

            <p>Website about myself and my projects for the coursework we had to do. Also includes a blog with a log in function.</p>
            
            <nav>
                <a href="https://github.com/shoperfy/ecsWeb" target="_blank"><img src="/werbsite/images/github.svg" alt="github">GitHub</a>
            </nav>

            <section class="info">
                <p><b>Category:</b> Coursework project</p>
                <p><b>Status:</b> Work in progress</p>
                <p><b>Started:</b> March 2024</p>
                <p><b>Ended:</b> Not yet</p>
                <p><b>Technologies used:</b> HTML, CSS</p>
            </section>



        </article>



    </main>



    <footer>
        <div class="foot">
            <p>&copy; Made with &Lt;3 by Brendon Janku</p>
        </div>
    </footer>


</body>
</html>