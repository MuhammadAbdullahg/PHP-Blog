<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Model {
    public static function data($table) {
        $stmt = (new Database())->getConnection()->prepare("SELECT * FROM {$table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($table, $column, $method, $mode = PDO::FETCH_ASSOC, $value = null) {
        $stmt = (new Database())->getConnection()->prepare("SELECT * FROM {$table} WHERE {$column} = ?");
        $stmt->execute([$value]);
        return $stmt->$method($mode);
    }

    public static function create($sql, $params = []) {
        $stmt = (new Database())->getConnection()->prepare($sql);
        $stmt->execute($params);
    }
}