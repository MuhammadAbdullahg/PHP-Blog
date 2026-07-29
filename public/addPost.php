<?php
if(session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    require "../config/db.php";
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

                    header("Location: index.php");
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
?>
<?php require "../views/header.php" ?>
    <div style="display: flex;align-items:center;justify-content:center;">
  <div class="form-container">
    <h2>Create New Blog Post</h2>
    <?php foreach($errors as $error) : ?>
        <p><?= $error ?></p>
    <?php endforeach ?>
    <form action="addPost.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" required>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Category</label>
                <select name="category">
                    <option>Tech</option>
                    <option>Science</option>
                    <option>Food</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" rows="10"></textarea>
        </div>
        <button type="submit">Publish</button>
    </form>
  </div>
  </div>
<?php require "../views/footer.php" ?>