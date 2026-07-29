<?php
session_start();
if(!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
require "../config/db.php";

if(!isset($_GET['id'])) {
  echo "id not found";
}
  
$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);

$post = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Post Page | Blog Website</title>
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
        </ul>
      </nav>
    </header>
    <main class="post">
      <section>
        <div class="banner_image">
          <img src="<?= $post['image_path'] ?>" alt="banner" />
        </div>
        <h1><?= $post['title'] ?></h1>
        <div class="about-author">
          <p><?= $post['created_at'] ?></p>
        </div>
      </section>
      <hr />
      <article>
        <p>
          <?= $post['content'] ?>
        </p>
      </article>
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