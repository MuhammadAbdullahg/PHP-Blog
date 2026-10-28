<?php

namespace App\Controllers;

use App\Core\Session;
use App\Models\PostModel;
use App\Config\AppConfig;
use App\Middleware\AuthMiddleware;
use App\Models\Model;
use PDO;

class PostsController {
    private $commonPath;
    public function index() {
        $posts = PostModel::data("posts");

        require __DIR__ . '/../Views/posts/index.view.php';
    }

    public function addPost() {
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
                                        $this->commonPath = AppConfig::getCommonPath();
                                        header("Location: {$this->commonPath}");
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
        $posts = PostModel::data("posts");
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category = trim($_POST['category']);
    
            $posts = PostModel::find("posts", "category", "fetchAll", PDO::FETCH_ASSOC, $category);
        }

        require __DIR__ . '/../Views/posts/category.view.php';
        if(empty($posts)) {
            echo "no post found";
        }
    }

    public function posts() {
        Session::sessionStart();

        $posts = PostModel::data("posts");

        require __DIR__ . '/../Views/posts/posts.view.php';
        
        if(empty($posts)) {
            echo "no post found";
        }
    }

    
    public function toggleLike(): void {
        Session::sessionStart();

        header('Content-Type: application/json; charset=utf-8');

        // 1. Receive and validate the post ID.
        $postId = filter_input(
            INPUT_POST,
            'post_id',
            FILTER_VALIDATE_INT
        );

        if (!$postId || $postId < 1) {
            http_response_code(400);

            echo json_encode([
                'success' => false,
                'message' => 'Invalid post ID.'
            ]);
            return;
        }

        // 2. Identify the logged-in user.
        $userId = $_SESSION['user_id'] ?? null;

        if (!$userId) {
            http_response_code(401);

            echo json_encode([
                'success' => false,
                'message' => 'Please log in first.'
            ]);
            return;
        }

        // 3. Check whether this user already liked the post.
        $likeExists = Model::checkPostLike(
            $userId,
            $postId
        );
        $liked = null;

        // 4. Toggle the like.
        if ($likeExists) {
            PostModel::likeOrDislikePost(
                $postId,
                "DELETE FROM postslike
                WHERE user_id = :userId
                AND post_id = :postId"
            );

            $liked = false;
        } else {
            PostModel::likeOrDislikePost($postId);

            $liked = true;
        }

        // 5. Get the new total.
        $likes = Model::getLikes($postId);

        // 6. Return JSON to jQuery.
        echo json_encode([
            'success' => true,
            'liked' => $liked,
            'like_count' => (int) $likes
        ]);
    }

    public function comment() {
        Session::sessionStart();

        header('Content-Type: application/json; charset=utf-8');

        
    }


    public function allPosts() {
        self::posts();
    }

    public function post() {
        $id = $_GET['id'];
        $userId = $_SESSION['user_id'] ?? null;
        $likeExists = Model::checkPostLike(
            $userId,
            $id
        );
        $liked = null;

        // 4. Toggle the like.
        if ($likeExists == 1) {
            $liked = true;
        } else {
            $liked = false;
        }

        $post = PostModel::find("posts", "post_id", "fetch", PDO::FETCH_ASSOC, $id);
        $likes = Model::getLikes($id);
        
        require __DIR__ . '/../Views/posts/post.view.php';
    }
}