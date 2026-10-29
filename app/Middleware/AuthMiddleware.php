<?php

namespace App\Middleware;

use App\Core\Session;
use App\Config\AppConfig;

class AuthMiddleware {
    private $commonPath;
    public function handle() {
        $this->commonPath = AppConfig::getCommonPath();
        if (!Session::get('user_id')) {
            $isAjax = strtolower(
                $_SERVER['HTTP_X_REQUESTED_WITH'] ?? ''
            ) === 'xmlhttprequest';

            if ($isAjax) {
                http_response_code(401);
                header('Content-Type: application/json; charset=utf-8');

                echo json_encode([
                    'success' => false,
                    'message' => 'Please log in first.',
                    'redirect' => '/PHP-Blog/public/login'
                ]);

                exit;
            }
            if(!Session::has('user_id')) {
                header("Location: {$this->commonPath}login");
                exit();
            }
            }
        }
    }