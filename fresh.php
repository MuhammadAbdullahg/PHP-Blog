<?php

require __DIR__ . '/config/db.php';

echo "file tracking system on \n";

$stmt = $pdo->prepare("SELECT migration FROM migrations ORDER BY id DESC");
$stmt->execute();
$executedFiles = $stmt->fetchAll(PDO::FETCH_COLUMN);

$newFiles = [];

$files = glob("migrations/*.php");

echo "get unexecuted files \n";

echo "requiring unexecuted files \n";

echo "executing sql newFile \n";
var_dump($executedFiles);

foreach($executedFiles as $index => $executedFile) {
    $count = count($executedFiles) - 1;
    var_dump($count);
    if(in_array($executedFile, $files)) {
        $newFiles[] = $executedFile;
        $reponse = require_once $executedFile;
        var_dump($executedFile);
        $sql = $reponse["down"];
        var_dump($sql);
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "updating migrations table \n";
        if($count == $index) {
            return;
        }
        $stmt = $pdo->prepare("DELETE FROM migrations WHERE migration = ?");
        $stmt->execute([$executedFile]);
    }
}
execFileCheck();


