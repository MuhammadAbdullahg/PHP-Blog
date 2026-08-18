<?php

require __DIR__ . '/config/db.php';
require __DIR__ . '/functions.php';

echo "file tracking system on \n";
$sql = selMigOrByDesc();

$stmt = $pdo->prepare($sql);
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
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "updating migrations table \n";
        $sqlFile = delFileInMig();
        $stmt = $pdo->prepare($sqlFile);
        $stmt->execute([$executedFile]);
    }
}
execFileCheck();


