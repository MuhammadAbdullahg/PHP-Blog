<?php
if(!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    session_start();
    require "../config/db.php";
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
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

                    // header("Location: index.php");
                    // exit();
                } else {
                    echo "Failed to move uploaded file.";
                }
            } else {
                echo "Your file is too large. Max limit is 5MB.";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF allowed.";
    }
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Blog Page | Blog Website</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/7a4b62b0a4.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <nav>
        <h1>Great Zone</h1>
        <ul>
          <a href="index.php">
            <li>Home</li>
          </a>
          <li>Posts</li>
          <li>
            <a href="addPost.php">Add Post</a>
          </li>
        </ul>
      </nav>
    </header>
    <div style="display: flex;align-items:center;justify-content:center;">
  <div class="form-container">
    <h2>Create New Blog Post</h2>
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
</body>
</html>