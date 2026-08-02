<?php

sessionStartCheck();

require __DIR__ . '/../../config/db.php';

$stmt = $pdo->prepare("SELECT * FROM posts");
$stmt->execute();
$posts = $stmt->fetchAll();

require __DIR__ . '/../../views/posts/index.view.php';
