<?php

sessionStartCheck();
$_SESSION = [];
session_destroy();

header("Location: /PHP-Blog/public/login");
exit();