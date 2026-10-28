<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class UserModel extends Model {
    public static function addUser(string $name, string $email, $password) {
        Model::create("INSERT INTO users (username, useremail, password) VALUES (?, ?, ?)", [$name, $email, $password]);
    }
}