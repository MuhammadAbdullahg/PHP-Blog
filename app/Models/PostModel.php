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

    public static function addComment($userId, $postId, $comment) {
        $stmt = (new Database())->getConnection()->prepare("INSERT INTO comments(user_id, post_id, comment) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $postId, $comment]);
    }

    public static function getComments($postId) {
        $stmt = (new Database())->getConnection()->prepare("SELECT users.username, comments.comment FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE comments.post_id = ?");
        $stmt->execute([$postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}