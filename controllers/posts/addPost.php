<?php  

sessionStartCheck();
sessionValidation();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    require __DIR__ . '/../../config/db.php';
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
                    $sql = "INSERT INTO posts (user_id, file_name, title, category, image_path, content) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$_SESSION['user_id'], $newFileName, $title, $category, $fileDestination, $content]);

                    header("Location: /PHP-blog/public/");
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

require __DIR__ . '/../../views/posts/addPost.view.php';