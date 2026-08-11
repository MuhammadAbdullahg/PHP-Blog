<?php
  $errors = [];
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    require __DIR__ . '/../../config/db.php';
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    
    if(empty($name) || empty($email) || empty($password)) {
      $errors[] = "Please fill all field";
    }
      
    $stmt = queryInfo("email", $email, "users");

    $existingUser = $stmt->fetchAll();
        
    if($existingUser) {
      $errors[] = "User already exist";
    }

    if(empty($errors)) {
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
      $stmt->execute([$name, $email, $hashedPassword]);
      
      header("Location: /demo/PHP-Blog/public/login");
      exit();
    }
  }
  require __DIR__ . '/../../views/auth/register.view.php';
