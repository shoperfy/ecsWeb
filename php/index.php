<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>brendons website</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/werbsite/css/reset.css">

  <link rel="stylesheet" href="/werbsite/css/index.css">

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


    <div class="info">
      <span class="hello">Hello, I'm Brendon</span>

      <article class="me">
        <div class="meColumn">
          <p>I'm a first year Computer Science student at Queen Mary University of London.
            I love playing video games and cooking. I should've probably gone into culinary school.
          </p>
          <p>I started out with C++, Python and now Java and the web stack. I am the two-time, back to back champion of the C++ olympiad that was held in albania when I was in 8th and 9th grade.
            I want to go more in depth on web development and maybe cybersecurity. Although, I'll probably end up being
            a farmer with how things are going in the tech space.
          </p>
        </div>
        <figure class="fig1">
          <img src="/werbsite/images/brendon3.jpeg" alt="me" id="brendon">
          <figcaption>my best picture</figcaption>
        </figure>
      </article>


      <div class="skills">
        <h1 id="skills">Skills</h1>
        <ul>
          <li id="java">
            <img src="/werbsite/images/skills/java.svg" alt="java">Java
          </li>
          <li id="python">
            <img src="/werbsite/images/skills/python.svg" alt="python">Python
          </li>
          <li id="html">
            <img src="/werbsite/images/skills/html.svg" alt="html">HTML
          </li>
          <li id="css">
            <img src="/werbsite/images/skills/css.svg" alt="css">CSS
          </li>
          <li id="js">
            <img src="/werbsite/images/skills/js.svg" alt="js">JavaScript
          </li>
          <li id="cpp">
            <img src="/werbsite/images/skills/cpp.svg" alt="cpp">C++
          </li>
        </ul>
      </div>

      <div class="hobbies">
        <h1 id="hobbies">Hobbies</h1>
        <ul>
          <li id="programming">
            <img src="/werbsite/images/hobbies/programming.svg" alt="programming">Coding
          </li>
          <li id="gaming">
            <img src="/werbsite/images/hobbies/gaming.svg" alt="gaming">Gaming
          </li>
          <li id="cooking">
            <img src="/werbsite/images/hobbies/cooking.svg" alt="cooking">Cooking
          </li>
          <li id="keyboards">
            <img src="/werbsite/images/hobbies/keyboards.svg" alt="keyboards">Keyboards
          </li>
          <li id="fashion">
            <img src="/werbsite/images/hobbies/fashion.svg" alt="fashion">Fashion
          </li>
          <li id="hating">
            <img src="/werbsite/images/hobbies/hating.svg" alt="hating">Hating
          </li>
        </ul>
      </div>


    </div>


  </main>

  <footer>
    <div class="contact">
      <ul>
        <div>Contact me:</div>
        <li><img src="/werbsite/images/footer/email.svg" alt="email"> <a href="mailto:brendo05b@gmail.com">Email</a></li>
        <li><img src="/werbsite/images/footer/linkedin.svg" alt="linkedin"> <a href="https://www.linkedin.com/in/brendon-janku-892070292/">LinkedIn</a></li>
        <li><img src="/werbsite/images/footer/twitter.svg" alt="twitter"><a href="https://twitter.com/shoperfy">Twitter/X</a></li>

      </ul>

    </div>

    <div class="foot">
      <p>&copy; Made with &Lt;3 by Brendon Janku</p>
    </div>
  </footer>
</body>

</html>