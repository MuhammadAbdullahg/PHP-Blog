<?php
require __DIR__ . '/../../autoload.php';
use App\Core\Session;
use App\Models\PostModel;
Session::sessionStart();
var_dump($_SESSION);
exit();
class PostSeeder {
    public static function run() {
        PostModel::addPost(3,'IMG_6a69de54ed3102.87158791.png', 'Qui doloremque qui i', 'Science', 'uploads/IMG_6a69de54ed3102.87158791.png', 'Voluptatem saepe inc');
    }
}