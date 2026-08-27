<?php
require __DIR__ . '/../autoload.php';
use App\Core\Session;

Session::sessionStart();

require __DIR__ . '/../routes.php';
require __DIR__ . '/../config/config.php';

$router->route($requestMethod, $uri);
