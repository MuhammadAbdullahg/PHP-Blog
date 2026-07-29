<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page | Blog Website</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/7a4b62b0a4.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <nav>
        <h1>Great Zone</h1>
        <ul>
          <a href="index.php">
            <li>Home</li>
          </a>
          <li>
            <a href="addPost.php">Add Post</a>
          </li>
          <?php if(isset($_SESSION['user_id'])) : ?>
            <li>
              <a href="logout.php">Logout</a>
            </li>
          <?php else : ?>
            <li>
              <a href="login.php">Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>