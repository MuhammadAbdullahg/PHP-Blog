<?php  

sessionStartCheck();
sessionValidation();

require __DIR__ . '/../../config/db.php';
$posts = allPosts();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = trim($_POST['category']);
    
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE category = ?");
    $stmt->execute([$category]);
    
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

require __DIR__ . '/../../views/posts/category.view.php';
if(empty($post)) {
    echo "no post found";
}