<?php

namespace App\Middleware;

use App\Core\Session;

class AuthMiddleware {
    public function handle() {
        if(Session::has('user_id')) {
            header("Location: /PHP-blog/public/login");
            exit();
        }
    }
}