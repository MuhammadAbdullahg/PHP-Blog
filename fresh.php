<?php

use App\Core\Database;

require "./autoload.php";
require "./Migration.php";

echo "file tracking system on \n";
$migration = new Migration();
$sql = $migration->selMigOrByDesc();

$stmt = (new Database())->getConnection()->prepare($sql);
$stmt->execute();
$executedFiles = $stmt->fetchAll(PDO::FETCH_COLUMN);

$newFiles = [];

$files = glob("migrations/*.php");

foreach($executedFiles as $index => $executedFile) {
    $count = count($executedFiles) - 1;
    if(in_array($executedFile, $files)) {
        $newFiles[] = $executedFile;
        $reponse = require_once $executedFile;
        $fn = substr($executedFile,11);
        var_dump($fn);
        $sql = $reponse["down"];
        $stmt = (new Database())->getConnection()->prepare($sql);
        $stmt->execute();
        echo "updating migrations table \n";
        $sqlFile = $migration->delFileInMig();
        $stmt = (new Database())->getConnection()->prepare($sqlFile);
        $stmt->execute([$executedFile]);
    }
}
$migration->execFileCheck();

