<?php
  $errors = [];
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    require "../config/db.php";
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    
    if(empty($name) || empty($email) || empty($password)) {
      $errors[] = "Please fill all field";
    }
      
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch();
        
    if($existingUser) {
      $errors[] = "User already exist";
    }

    if(empty($errors)) {
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
      $stmt->execute([$name, $email, $hashedPassword]);
      
      header("Location: login.php");
      exit();
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Register - Task Manager</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="auth-wrapper">
      <div class="card">
        <h1>Create account</h1>
        <?php foreach($errors as $error) : ?>
          <p class="error"><?= $error ?></p>
        <?php endforeach; ?>
        <form method="POST" action="register.php">
          <div class="field">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? "")  ?>" required />
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? "")  ?>" required />
          </div>
          <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?= htmlspecialchars($_POST['password'] ?? "")  ?>" required />
          </div>
          <button type="submit" class="btn">Register</button>
        </form>
        <p class="link-row">
          Already have an account? <a href="login.php">Login</a>
        </p>
      </div>
    </div>
  </body>
</html>
