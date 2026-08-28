<?php
require __DIR__ . '/../autoload.php';

use App\Config\AppConfig;
use App\Core\Session;

Session::sessionStart();

require __DIR__ . '/../routes.php';

$configData = (new AppConfig())->configVar();

$router->route($configData['requestMethod'], $configData['uri']);
