<?php

sessionStartCheck();
$_SESSION = [];
session_destroy();

header("Location: /demo/PHP-Blog/public/login");
exit();