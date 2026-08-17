<?php

require __DIR__ . '/config/db.php';

echo "file tracking system on \n";

$stmt = $pdo->prepare("SELECT migration FROM migrations");
$stmt->execute();
$executedFiles = $stmt->fetchAll(PDO::FETCH_COLUMN);

$newFiles = [];

$files = glob("migrations/*.php");

echo "get unexecuted files \n";

echo "requiring unexecuted files \n";

echo "executing sql newFile \n";

foreach($files as $file) {
    if(in_array($file, $executedFiles)) {
        $newFiles[] = $file;
        $reponse = require_once $file;
        $sql = $reponse["down"];
        var_dump($sql);
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "updating migrations table \n";
        $stmt = $pdo->prepare("DELETE FROM migrations WHERE migration = ?");
        $stmt->execute([$file]);
    }
}

if(empty($newFiles)) {
    echo "no file for exec\n";
    exit();
}


