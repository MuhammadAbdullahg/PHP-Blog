<?php
session_start();

require "../config/db.php";

$stmt = $pdo->prepare("SELECT * FROM posts");
$stmt->execute();
$posts = $stmt->fetchAll();
?>
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
          <li>Posts</li>
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
    <main>
      <section id="hero">
        <div class="hero_content">
          <h1>Make Zone Better !</h1>
          <h4>Why Better Zone Important ?</h4>
        </div>
        <div class="hero_image">
          <img src="images/hero.png" alt="hero" />
        </div>
      </section>
      <?php if(isset($_SESSION['user_id'])) : ?>
          <div>
            <div class="h-card" style="display: flex; align-items: center; justify-content: space-between;">
              <?php foreach($posts as $post) : ?>
              <div class="card_content">
                <h2><?= $post['title'] ?></h2>
                <p>
                  <?= $post['content'] ?>
                </p>
                <div class="status">
                  <p><?= $post['created_at'] ?></p>
                  <a href="post.php?id=<?= $post['id'] ?>"><button class="read-btn">Read More</button></a>
                </div>
              </div>
              <img src="<?= $post['image_path'] ?>" alt="laptop guy" />
              <?php endforeach; ?>
            </div>
          </div>
      <?php endif; ?>
    </main>
    <hr />
    <footer>
      <p>GreatZone 2022 copyright all rights reserved</p>

      <ul>
        <li>
          <i class="fa fa-instagram"></i>
        </li>
        <li>
          <i class="fa fa-twitter"></i>
        </li>
        <li>
          <i class="fab fa-linkedin"></i>
        </li>
      </ul>
    </footer>
  </body>
</html>