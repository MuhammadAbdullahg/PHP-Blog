<?php

require __DIR__ . '/autoload.php';

require __DIR__ . '/app/Seeders/UserSeeder.php';
require __DIR__ . "/app/Seeders/PostSeeder.php";
use App\Core\Database;

$stmt = (new Database())->getConnection()->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();
if(empty($users)) {
    UserSeeder::run();
} else {
    echo "data already added";
}
PostSeeder::run();