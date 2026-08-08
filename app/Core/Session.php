<?php

namespace App\Core;

class Session {
    public static function sessionStart() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set(string $key, $value) {
        $_SESSION[$key] = $value;
        var_dump($_SESSION);
    }

    public static function get(string $key, $default = null) {
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        };

        return $default;
    }

    public static function has(string $key) {
        if(isset($_SESSION[$key])) {
            return true;
        } else {
            return false;
        }
    }

    public static function destroy() {
        self::sessionStart();
        $_SESSION = [];
        session_destroy();
    }
}