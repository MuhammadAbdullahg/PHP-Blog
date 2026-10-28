<?php

namespace App\Core;
use PDO;

class Database {
    private static ?PDO $instanse = null;

    public function getConnection(): PDO {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => true,
        ];
        if(self::$instanse == null) {
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "blog";

            try {
                self::$instanse = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, $options);
                // self::$instanse->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES);
                self::$instanse->exec("SET time_zone = '+00:00'");
            } catch (\PDOException $e) {
                die("Database connection failed:" . $e->getMessage());
            }
        }

        return self::$instanse;
    }
}