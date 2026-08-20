<?php

use App\Core\Database;

require "./Migration.php";
$migration = new Migration();

[$executedFiles, $newFiles, $files] = $migration->getMigrationAndSqlFiles();

foreach($files as $index => $file) {
    if(!in_array($file, $executedFiles)) {
        $newFiles[] = $file;
        $fn = substr($file,11);
        var_dump($fn);
        $reponse = require_once $file;
        $sqlTable = $reponse["up"];
        $stmt = (new Database())->getConnection()->prepare($sqlTable);
        $stmt->execute();
        echo "updating migrations table \n";
        $sqlFile = $migration->addFileInMig();
        $stmt = (new Database())->getConnection()->prepare($sqlFile);
        $stmt->execute([$file]);
    } else {
        $migration->execFileCheck();
    }
}

