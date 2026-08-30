<?php
namespace App\Seeders;
require __DIR__ . '/../../autoload.php';
use App\Models\UserModel;
class UserSeeder {
    public static function run() {
        $users = [
            [
                'name' => 'Alice Smith',
                'email' => 'alice@example.com',
                'password' => password_hash('securepass1', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'Bob Jones',
                'email' => 'bob@example.com',
                'password' => password_hash('securepass2', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charlie@example.com',
                'password' => password_hash('securepass3', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'Diana Prince',
                'email' => 'diana@example.com',
                'password' => password_hash('securepass4', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'Ethan Hunt',
                'email' => 'ethan@example.com',
                'password' => password_hash('securepass5', PASSWORD_DEFAULT)
            ]
        ];
        foreach ($users as $key => $user) {
            UserModel::addUser($user['name'], $user['email'], $user['password']);
        }
        echo "data added";
    }
}