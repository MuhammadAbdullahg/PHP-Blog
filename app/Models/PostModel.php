<?php

namespace App\Models;

use App\Core\Database;
use App\Core\Session;
use PDO;

class PostModel extends Model {
    // public static function allPosts() {
    //     $stmt = (new Database)->getConnection()->prepare("SELECT * FROM posts");
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public static function addPost($user_id, $newFileName, $title, $category, $fileDestination, $content) {
        $sql = "INSERT INTO posts (user_id, file_name, title, category, image_path, content) VALUES (?, ?, ?, ?, ?, ?)";
        Model::create($sql, [$user_id, $newFileName, $title, $category, $fileDestination, $content]);
    }

    // public static function category($category) {
    //     $stmt = (new Database())->getConnection()->prepare("SELECT * FROM posts WHERE category = ?");
    //     $stmt->execute([$category]);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public static function post($id) {
    //     $stmt = (new Database)->getConnection()->prepare("SELECT * FROM posts WHERE id = ?");
    //     $stmt->execute([$id]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
}