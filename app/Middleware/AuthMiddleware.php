<?php

namespace App\Middleware;

use App\Core\Session;
use App\Config\AppConfig;

class AuthMiddleware {
    private $commonPath;
    public function handle() {
        $this->commonPath = (new AppConfig())->getCommonPath();
    
        if(!Session::has('user_id')) {
            header("Location: {$this->commonPath}login");
            exit();
        }
    }
}