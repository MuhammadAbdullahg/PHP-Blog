<?php
require __DIR__ . '/../autoload.php';
date_default_timezone_set('UTC');
use App\Config\AppConfig;
// use App\Core\Database;
use App\Core\Session;
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

Session::sessionStart();

require __DIR__ . '/../routes.php';

$configData = (new AppConfig())->configVar();

$router->route($configData['requestMethod'], $configData['uri']);
