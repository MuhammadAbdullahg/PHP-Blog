<?php

sessionStartCheck();
require __DIR__ . '/../../config/db.php';

if(!isset($_GET['id'])) {
  echo "id not found";
}
  
$id = (int) $_GET['id'];

$stmt = queryInfo("id", $id, "posts");
$post = $stmt->fetch();

require __DIR__ . '/../../views/posts/post.view.php';
