<?php

use App\Models\PostModel;

class PostSeeder {
    public static function run() {
        PostModel::addPost(12,'IMG_6a69de54ed3102.87158791.png', 'Qui doloremque qui i', 'Science', 'uploads/IMG_6a69de54ed3102.87158791.png', 'Voluptatem saepe inc');
    }
}