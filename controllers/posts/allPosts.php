<?php  

sessionStartCheck();

require __DIR__ . '/../../config/db.php';
$posts = allPosts();

require __DIR__ . '/../../views/posts/posts.view.php';
if(empty($post)) {
    echo "no post found";
}