<?php

namespace App\Controllers;

use App\Core\Session;
use App\Middleware\AuthMiddleware;
use App\Models\PostModel;

class PostsController {
    public function index() {
        Session::sessionStart();

        $posts = PostModel::allPosts();

        require __DIR__ . '/../Views/posts/index.view.php';
    }

    public function addPost() {
        Session::sessionStart();
        (new AuthMiddleware())->handle();
        $errors = [];
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
                $file = $_FILES['image'];

                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];

                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

                    if (in_array($fileExt, $allowedExtensions)) {
                        if ($fileError === 0) {
                            if ($fileSize < 5000000) {
                                $uploadDirectory = 'uploads/';
                                $title = htmlspecialchars(trim($_POST['title']));
                                $category = htmlspecialchars(trim($_POST['category']));
                                $content = htmlspecialchars(trim($_POST['content']));

                                if (!is_dir($uploadDirectory)) {
                                    mkdir($uploadDirectory, 0777, true);
                                }

                                $newFileName = uniqid('IMG_', true) . '.' . $fileExt;
                                $fileDestination = $uploadDirectory . $newFileName;

                                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                                        PostModel::addPost($_SESSION['user_id'], $newFileName, $title, $category, $fileDestination, $content);

                                        header("Location: {$commonPath}");
                                        exit();
                                    } else {
                                        $errors[] = "Failed to move uploaded file.";
                                    }
                            } else {
                                $errors[] = "Your file is too large. Max limit is 5MB.";
                            }
                        } else {
                            $errors[] = "There was an error uploading your file.";
                    }
                } else {
                    $errors[] = "Invalid file type. Only JPG, JPEG, PNG, and GIF allowed.";
                }
            }

        require __DIR__ . '/../Views/posts/addPost.view.php';
    }

    public function category() {
        Session::sessionStart();

        $posts = PostModel::allPosts();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category = trim($_POST['category']);
    
            $posts = PostModel::category($category);
        }

        require __DIR__ . '/../Views/posts/category.view.php';
        if(empty($posts)) {
            echo "no post found";
        }
    }

    public function posts() {
        Session::sessionStart();

        $posts = PostModel::allPosts();

        require __DIR__ . '/../Views/posts/posts.view.php';
        if(empty($posts)) {
            echo "no post found";
        }
    }

    public function allPosts() {
        self::posts();
    }
}