<?php
namespace App\Seeders;
require __DIR__ . '/../../autoload.php';
use App\Core\Database;
use App\Models\PostModel;
use PDO;

class PostSeeder {
    public static function run() {
        $stmt = (new Database())->getConnection()->prepare("SELECT user_id FROM users");
        $stmt->execute();
        $ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
        foreach($ids as $id) {
            PostModel::addPost($id,'IMG_6a69de54ed3102.87158791.png', 'Qui doloremque qui i', 'Science', 'uploads/IMG_6a69de54ed3102.87158791.png', 'Voluptatem saepe inc');
        }
        echo "posts Added";
    }
}