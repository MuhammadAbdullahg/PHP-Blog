<?php
function sessionStartCheck() {
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}
        
function queryInfo(string $col, string $value) {
    require __DIR__ . '/config/db.php';
    $stmt = $pdo->prepare("SELECT * FROM users WHERE {$col} = ?");
        
    $stmt->execute([$value]);
    return $stmt->fetch();
}

function sessionValidation() {
    if(!isset($_SESSION['user_id'])) {
        header("Location: /PHP-blog/public/login");
        exit();
    }
}