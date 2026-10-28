<?php

namespace App\Models;

use App\Core\Database;
use App\Core\Session;
use PDO;

class PostModel extends Model {
    public static function addPost($user_id, $newFileName, $title, $category, $fileDestination, $content) {
        $sql = "INSERT INTO posts (user_id, file_name, title, category, image_path, content) VALUES (?, ?, ?, ?, ?, ?)";
        Model::create($sql, [$user_id, $newFileName, $title, $category, $fileDestination, $content]);
    }

    public static function likeOrDislikePost($postId, $sql = "INSERT INTO postslike(user_id, post_id) VALUES (:userId, :postId)") {
        $stmt = (new Database())->getConnection()->prepare($sql);
        $stmt->execute(['userId' => $_SESSION['user_id'], 'postId' => $postId]);
    }
}