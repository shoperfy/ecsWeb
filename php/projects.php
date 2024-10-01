<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About me</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/werbsite/css/reset.css">
    <link rel="stylesheet" href="/werbsite/css/projects.css">

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
        <span id="title">Projects + Work</span>

        <span id="subtitle">What I'm working on, and have worked on</span>

        <div class="container">

            <div class="div1">

                <figure>
                    <img src="/werbsite/images/website.png" alt="dodeca">
                    <figcaption>This website</figcaption>
                </figure>
                <p>The website you're looking at right now :)</p>
                <nav>
                    <a href="/werbsite/php/project1.php" target="_self">Learn more</a>
                    <a href="https://github.com/shoperfy/ecsWeb" target="_blank"><img src="/werbsite/images/github.svg" alt="github">Code</a>
                </nav>
            </div>

            <div class="div2">
                <h1>Coming soon...</h1>
            </div>

            <div class="div3">
                <h1>Coming soon...</h1>
            </div>

            <div class="div4">
                <h1>Coming soon...</h1>
            </div>

            <div class="div5">
                <h1>Coming soon...</h1>
            </div>

            <div class="div6">
                <h1>Coming soon...</h1>
            </div>

            <div class="div7">
                <h1>Coming soon...</h1>
            </div>

            <div class="div8">
                <h1>Coming soon...</h1>
            </div>

            <div class="div9">
                <h1>Coming soon...</h1>
            </div>

            <div class="div10">
                <h1>Coming soon...</h1>
            </div>

            <div class="div11">
                <h1>Coming soon...</h1>
            </div>

            <div class="div12">
                <h1>Coming soon...</h1>
            </div>


        </div>






    </main>


    <footer>
        <div class="foot">
            <p>&copy; Made with &Lt;3 by Brendon Janku</p>
        </div>
    </footer>

</body>

</html>