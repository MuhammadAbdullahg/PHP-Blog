<?php

namespace App\Core;
use PDO;

class Database {
    private static ?PDO $instanse = null;

    public function getConnection(): PDO {
        if(self::$instanse == null) {
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "blog";

            try {
                self::$instanse = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                self::$instanse->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die("Database connection failed:" . $e->getMessage());
            }
        }

        return self::$instanse;
    }
}