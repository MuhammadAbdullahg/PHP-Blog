<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class UserModel extends Model {
    // public static function findByEmail(string $email) {
    //     Model::find("users", "email", $email);
    // }

    public static function addUser(string $name, string $email, $password) {
        Model::create("INSERT INTO users (name, email, password) VALUES (?, ?, ?)", [$name, $email, $password]);
    }
}