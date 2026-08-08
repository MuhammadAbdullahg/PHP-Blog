<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class UserModel {
    public static function findByEmail(string $email) {
        $stmt = (new Database())->getConnection()->prepare("SELECT * FROM users WHERE email = ?");
        
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function addUser(string $name, string $email, $password) {
        $stmt = (new Database())->getConnection()->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);
    }
}