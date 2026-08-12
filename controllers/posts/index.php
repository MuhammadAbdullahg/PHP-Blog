<?php

sessionStartCheck();

require __DIR__ . '/../../config/db.php';

$posts = limitPosts();

require __DIR__ . '/../../views/posts/index.view.php';
