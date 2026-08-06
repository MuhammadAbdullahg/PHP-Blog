<?php
require __DIR__ . '/autoload.php';
use App\Core\Database;
function sessionStartCheck() {
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}
        
function queryInfo(string $col, string $value, string $table) {
    $stmt = (new Database)->getConnection()->prepare("SELECT * FROM {$table} WHERE {$col} = ?");
        
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
    $stmt = (new Database)->getConnection()->prepare("SELECT * FROM posts");
    $stmt->execute();
    return $stmt->fetchAll();
}

function route(string $route, string $controller) {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $requestUri = str_replace("/PHP-blog/public", "", $path);

    $uri = rtrim($requestUri, "/");

    if($uri == "") {
        $uri = "/";
    }
    
    if($uri === $route) {
        require __DIR__ . $controller;
    }
}