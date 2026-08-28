<?php

use App\Core\Database;
use App\Models\UserModel;
require "./autoload.php";
class UserSeeder {
    public static function run() {
        $stmt = (new Database())->getConnection()->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll();
        if(empty($users)) {
            echo "adding data";
            UserModel::addUsers();
            echo "data addded";
        }
        echo "data already added";
    }
}