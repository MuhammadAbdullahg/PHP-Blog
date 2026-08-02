<?php

sessionStartCheck();
$_SESSION = [];
session_destroy();

header("Location: /PHP-blog/public/login");
exit();