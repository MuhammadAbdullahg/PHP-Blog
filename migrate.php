<?php

require __DIR__ . '/config/db.php';
require "./functions.php";

[$executedFiles, $newFiles, $files] = getMigrationAndSqlFiles();

foreach($files as $index => $file) {
    if(!in_array($file, $executedFiles)) {
        $newFiles[] = $file;
        $fn = substr($file,11);
        var_dump($fn);
        $reponse = require_once $file;
        $sqlTable = $reponse["up"];
        $stmt = $pdo->prepare($sqlTable);
        $stmt->execute();
        echo "updating migrations table \n";
        $sqlFile = addFileInMig();
        $stmt = $pdo->prepare($sqlFile);
        $stmt->execute([$file]);
    }
}


