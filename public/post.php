<?php
if(session_status() == PHP_SESSION_NONE) {
  session_start();
}
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
<?php require "../views/header.php" ?>
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
<?php require "../views/footer.php" ?>