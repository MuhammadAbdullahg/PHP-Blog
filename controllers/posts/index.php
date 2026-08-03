<?php

sessionStartCheck();

require __DIR__ . '/../../config/db.php';

$posts = allPosts();

require __DIR__ . '/../../views/posts/index.view.php';
