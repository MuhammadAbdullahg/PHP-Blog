<?php

sessionStartCheck();
sessionValidation();
require __DIR__ . '/../../config/db.php';

if(!isset($_GET['id'])) {
  echo "id not found";
}
  
$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);

$post = $stmt->fetch();

require __DIR__ . '/../../views/posts/post.view.php';
