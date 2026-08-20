<?php
require __DIR__ . '/../autoload.php';
require __DIR__ . '/../routes.php';
require __DIR__ . '/../config/config.php';

$router->route($requestMethod, $uri);
