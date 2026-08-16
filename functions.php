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
    require __DIR__ . '/config/config.php';
    if(!isset($_SESSION['user_id'])) {
        header("Location: {$commonPath}login");
        exit();
    }
}

function limitPosts() {
    require __DIR__ . '/config/db.php';
    $stmt = $pdo->prepare("SELECT * FROM posts LIMIT 5");
    $stmt->execute();
    return $stmt->fetchAll();
}

function allPosts() {
    require __DIR__ . '/config/db.php';
    $stmt = $pdo->prepare("SELECT * FROM posts");
    $stmt->execute();
    return $stmt->fetchAll();
}

function route(string $uri, string $route, string $controller) {
    if($uri === $route) {
        require __DIR__ . $controller;
    }
}