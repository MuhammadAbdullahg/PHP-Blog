<?php require __DIR__ . '/../config/config.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page | Blog Website</title>
    <link rel="stylesheet" href="../public/style.css" />
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
          <a href="<?= $commonPath ?>">
            <li>Home</li>
          </a>
          <li>
            <a href="<?= $commonPath ?>posts">Posts</a>
          </li>
          <li>
            <a href="<?= $commonPath ?>category">category</a>
          </li>
          <?php if(isset($_SESSION['user_id'])) : ?>
            <li>
              <a href="<?= $commonPath ?>logout">Logout</a>
            </li>
          <?php else : ?>
            <li>
              <a href="<?= $commonPath ?>login">Login</a>
            </li>
          <?php endif; ?>
          <?php if(isset($_SESSION['user_name'])) : ?>
            <li>
              <a href="#">Welcome <?= $_SESSION['user_name'] ?></a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>