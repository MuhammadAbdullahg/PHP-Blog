<?php

require __DIR__ . '/../../autoload.php';
use App\Core\Database;
use App\Core\Session;
use App\Models\UserModel;
Session::sessionStart();
var_dump(Session::get("user_id"));
exit();
class UserSeeder {
    public static function run() {
        UserModel::addUser("hello", "hello@gmail.com", password_hash("hello", PASSWORD_DEFAULT));
        echo "data added";
    }
}