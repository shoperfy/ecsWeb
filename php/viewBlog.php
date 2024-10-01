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

// Get the selected month from the dropdown menu
$selectedMonth = isset($_GET['month']) ? $_GET['month'] : '';

// Retrieve blog posts from the database without sorting
$sql = "SELECT * FROM blogPosts";
$result = $conn->query($sql);

// Fetch the rows into an array
$blogPosts = array();
while ($row = $result->fetch_assoc()) {
  $blogPosts[] = $row;
}

// Define the partition function for QuickSort
function partition(&$blogPosts, $low, $high)
{
  $pivot = strtotime($blogPosts[$high]['dateTime']);
  $i = ($low - 1);

  for ($j = $low; $j <= $high - 1; $j++) {
    if (strtotime($blogPosts[$j]['dateTime']) >= $pivot) {
      $i++;
      $temp = $blogPosts[$i];
      $blogPosts[$i] = $blogPosts[$j];
      $blogPosts[$j] = $temp;
    }
  }
  $temp = $blogPosts[$i + 1];
  $blogPosts[$i + 1] = $blogPosts[$high];
  $blogPosts[$high] = $temp;
  return ($i + 1);
}

// Define the QuickSort function
function quickSort(&$blogPosts, $low, $high)
{
  if ($low < $high) {
    $pi = partition($blogPosts, $low, $high);

    quickSort($blogPosts, $low, $pi - 1);
    quickSort($blogPosts, $pi + 1, $high);
  }
}

// Sort the blog posts by date in descending order using QuickSort
$n = count($blogPosts);
quickSort($blogPosts, 0, $n - 1);

// Get the list of available months for the dropdown menu
$months = array();
foreach ($blogPosts as $post) {
  $month = date('Y-m', strtotime($post['dateTime']));
  if (!in_array($month, $months)) {
    $months[] = $month;
  }
}


$conn->close();
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

  <link rel="stylesheet" href="/werbsite/css/viewBlog.css">

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
    <h1>Blog posts</h1>

    <form action="" method="get">
      <label for="month">Filter by Month:</label>
      <select name="month" id="month">
        <option value="">All Months</option>
        <?php foreach ($months as $month) : ?>
          <option value="<?php echo $month; ?>" <?php if ($selectedMonth === $month) echo 'selected'; ?>>
            <?php echo date('F Y', strtotime($month)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <button type="submit">Filter</button>
    </form>

    <article class="posts">
      <?php
      // Display blog posts
      if (count($blogPosts) > 0) {
        foreach ($blogPosts as $post) {
          $postMonth = date('Y-m', strtotime($post['dateTime']));
          if (empty($selectedMonth) || $selectedMonth === $postMonth) {
            echo '<section class="post">';
            echo '<p class="date">' . $post["dateTime"] . '</p>';
            echo '<h2>' . $post["title"] . '</h2>';
            echo '<p>' . $post["description"] . '</p>';
            echo '</section>';
          }
        }
      } else {
        echo '<p>No blog posts found.</p>';
      }
      ?>
    </article>



    <footer>
      <div class="foot">
        <p>&copy; Made with &Lt;3 by Brendon Janku</p>
      </div>
    </footer>

</body>


</html>