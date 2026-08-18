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

function selMigOrByDesc() {
    return "SELECT migration FROM migrations ORDER BY id DESC";
}

function addFileInMig() {
    return "INSERT INTO migrations (migration) VALUES (?)";
}
function delFileInMig() {
    return "DELETE FROM migrations WHERE migration = ?";
}
function getMigrationAndSqlFiles() {
    require __DIR__ . '/config/db.php';
    echo "file tracking system on \n";

    $stmt = $pdo->prepare("CREATE TABLE IF NOT EXISTS `migrations` (
        `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `migration` varchar(50) DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp()
        );");
    $stmt->execute();

    $sql = selMigOrByDesc();

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $executedFiles = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    $newFiles = [];
    
    $files = glob("migrations/*.php");

    return [$executedFiles, $newFiles, $files];
}

function execFileCheck() {
    if(empty($newFiles)) {
        echo "no file for exec\n";
        exit();
    }
}