<?php
namespace App\Controllers;
require __DIR__ . '/../../config/config.php';

use App\Core\Session;
use App\Models\UserModel;

class AuthController {
    public function login() {
        echo "work";
        Session::sessionStart();
  
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $errors = [];
            $email = trim($_POST['email']);
            $password = $_POST['password'];
    
            if(empty($email) || empty($password)) {
                $errors[] = "Please fill all field";
            }
      
            $userData = UserModel::findByEmail($email);
            var_dump($userData);
        
            if(!$userData || !password_verify($password, $userData['password'])) {
                $errors[] = "Invalid email or password";
            }
      
            if(empty($errors)) {
                Session::set('user_id', $userData['user_id']);
                Session::set('user_name', $userData['name']);
                
                header("Location: /PHP-Blog/public/");
                exit();
            }
        }
    }

    public function getLogin() {
        $errors = [];
        require __DIR__ . '/../views/auth/login.view.php';
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $errors = [];
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

    
            if(empty($name) || empty($email) || empty($password)) {
                $errors[] = "Please fill all field";
            }
      
            $existingUser = UserModel::findByEmail($email);
        
            if($existingUser) {
                $errors[] = "User already exist";
            }

            if(empty($errors)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                UserModel::addUser($name, $email, $hashedPassword);
                header("Location: {$commonPath}login");
                exit();
            }
        }
    }

    public function getRegister() {
        $errors = [];
        require __DIR__ . '/../views/auth/register.view.php';
    }

    public function logout() {
        Session::destroy();

        header("Location: {$commonPath}login");
        exit();
    }
}