<?php
  sessionStartCheck();
  $errors = [];
  require __DIR__ . '/../../views/auth/login.view.php';
  
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    if(empty($email) || empty($password)) {
      $errors[] = "Please fill all field";
    }
      
    $userData = queryInfo("email", $email);
        
    if(!$userData || !password_verify($password, $userData['password'])) {
      $errors[] = "Invalid email or password";
      }
      
      if(empty($errors)) {
        $_SESSION['user_id'] = $userData['user_id'];
        $_SESSION['user_name'] = $userData['name'];
        
        header("Location: /PHP-blog/public/");
        exit();
        }
      }
