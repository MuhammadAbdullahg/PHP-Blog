<?php
namespace App\Controllers;

use App\Config\AppConfig;
use App\Core\Session;
use App\Models\UserModel;

class AuthController {
    public $loginErrors = [];
    public $registerErrors = [];
    private $commonPath;
    public function login() {
        $this->commonPath = (new AppConfig())->getCommonPath();
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
    
            if(empty($email) || empty($password)) {
                $this->loginErrors[] = "Please fill all field";
            }
      
            $userData = UserModel::findByEmail($email);
        
            if(!$userData || !password_verify($password, $userData['password'])) {
                $this->loginErrors[] = "Invalid email or password";
            }
      
            if(empty($this->loginErrors)) {
                Session::set('user_id', $userData['user_id']);
                Session::set('user_name', $userData['name']);
                
                header("Location: {$this->commonPath}");
                exit();
            }
            self::getLogin();
        }
    }

    public function getLogin() {
        $errors = $this->loginErrors;
        require __DIR__ . '/../views/auth/login.view.php';
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

    
            if(empty($name) || empty($email) || empty($password)) {
                $this->registerErrors[] = "Please fill all field";
            }
      
            $existingUser = UserModel::findByEmail($email);
        
            if($existingUser) {
                $this->registerErrors[] = "User already exist";
            }

            if(empty($this->registerErrors)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                UserModel::addUser($name, $email, $hashedPassword);
                header("Location: {$this->commonPath}login");
                exit();
            }
            self::getRegister();
        }
    }

    public function getRegister() {
        $errors = $this->registerErrors;
        require __DIR__ . '/../views/auth/register.view.php';
    }

    public function logout() {
        Session::destroy();

        header("Location: {$this->commonPath}");
        exit();
    }
}