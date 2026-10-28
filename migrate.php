<?php

use App\Core\Database;

require "./Migration.php";
$migration = new Migration();

[$executedFiles, $newFiles, $files] = $migration->getMigrationAndSqlFiles();

// var_dump($executedFiles);
// var_dump($newFiles);
// var_dump($files);
foreach($files as $index => $file) {
    var_dump($file);
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
        if(count($files) == count($executedFiles)) {
            $migration->execFileCheck();
        }
    }
}

