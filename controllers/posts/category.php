<?php  

sessionStartCheck();
sessionValidation();

require __DIR__ . '/../../config/db.php';
$posts = allPosts();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = trim($_POST['category']);
    
    $stmt = queryInfo("category", $category, "posts");
    $posts = $stmt->fetchAll();
}

require __DIR__ . '/../../views/posts/category.view.php';
if(empty($post)) {
    echo "no post found";
}