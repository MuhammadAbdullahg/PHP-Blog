<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];
$commonPath = "/PHP-Blog/public/";

$requestUri = str_replace("/PHP-Blog/public", "", $path);

$uri = rtrim($requestUri, "/");

if($uri == "") {
    $uri = "/";
}