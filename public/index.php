<?php
require __DIR__ . '/../autoload.php';
require __DIR__ . '/../routes.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$requestUri = str_replace("/PHP-blog/public", "", $path);

$uri = rtrim($requestUri, "/");

if($uri == "") {
    $uri = "/";
}

$router->route($requestMethod, $uri);
