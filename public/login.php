<?php
  session_start();
  require "../config/db.php";
  $errors = [];

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    if(empty($email) || empty($password)) {
      $errors[] = "Please fill all field";
    }
      
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        
    $stmt->execute([$email]);
    $userData = $stmt->fetch();
        
    if(!$userData || !password_verify($password, $userData['password'])) {
      $errors[] = "Invalid email or password";
    }

    if(empty($errors)) {
      $_SESSION['user_id'] = $userData['user_id'];
      $_SESSION['user_name'] = $userData['name'];
      
      header("Location: index.php");
      exit();
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login - Task Manager</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="auth-wrapper">
      <div class="card">
        <h1>Log in</h1>
        <?php foreach($errors as $error) : ?>
          <p class="error"><?= $error ?></p>
        <?php endforeach; ?>
        <form method="POST" action="login.php">
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required />
          </div>
          <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />
          </div>
          <button type="submit" class="btn">Log in</button>
        </form>
        <p class="link-row">No account? <a href="register.php">Register</a></p>
      </div>
    </div>
  </body>
</html>
