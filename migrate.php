<?php

require __DIR__ . '/config/db.php';

echo "file tracking system on \n";

$stmt = $pdo->prepare("SELECT migration FROM migrations");
$stmt->execute();
$executedFiles = $stmt->fetchAll(PDO::FETCH_COLUMN);

$newFiles = [];

$files = glob("migrations/*.php");

foreach($files as $file) {
    if(!in_array($file, $executedFiles)) {
        $newFiles[] = $file;
        include $file;
    }
}

echo "get unexecuted files \n";

if(empty($newFiles)) {
    echo "no file for exec run again for rollback\n";
    if(array_count_values($executedFiles) == array_count_values($files)) {
        rb($pdo);
    }
} else {
    foreach($newFiles as $newFile) {
        echo "requiring unexecuted files \n";
        var_dump($newFile);
        echo "executing sql newFile \n";
        up($pdo);
        echo "updating migrations table \n";
        $stmt = $pdo->prepare("INSERT INTO migrations (migration) VALUES (?)");
        $stmt->execute([$newFile]);
    }
}
