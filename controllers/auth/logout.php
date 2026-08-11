<?php
require __DIR__ . '/../../config/config.php';
sessionStartCheck();
$_SESSION = [];
session_destroy();

header("Location: {$commonPath}login");
exit();