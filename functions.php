<?php
function sessionStartCheck() {
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}
        
function queryInfo(string $col, string $value, string $table) {
    require __DIR__ . '/config/db.php';
    $stmt = $pdo->prepare("SELECT * FROM {$table} WHERE {$col} = ?");
        
    $stmt->execute([$value]);
    return $stmt;
}

function sessionValidation() {
    if(!isset($_SESSION['user_id'])) {
        header("Location: /PHP-blog/public/login");
        exit();
    }
}

function allPosts() {
    require __DIR__ . '/config/db.php';
    $stmt = $pdo->prepare("SELECT * FROM posts");
    $stmt->execute();
    return $stmt->fetchAll();
}

function route(string $route, string $controller) {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $requestUri = str_replace("/demo/PHP-Blog/public", "", $path);

    $uri = rtrim($requestUri, "/");

    if($uri == "") {
        $uri = "/";
    }
    
    if($uri === $route) {
        require __DIR__ . $controller;
    }
}