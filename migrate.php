<?php

require __DIR__ . '/config/db.php';
require "./functions.php";

[$executedFiles, $newFiles, $files] = getMigrationAndSqlFiles();

foreach($files as $index => $file) {
    if($file == "migrations/001-create-migration-table.php") {
        continue;
    }
    if(!in_array($file, $executedFiles)) {
        $newFiles[] = $file;
        var_dump($file);
        $reponse = require_once $file;
        $sql = $reponse["up"];
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "updating migrations table \n";
        $stmt = $pdo->prepare("INSERT INTO migrations (migration) VALUES (?)");
        $stmt->execute([$file]);
    }
}


