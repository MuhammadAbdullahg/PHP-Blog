<?php

spl_autoload_register(function($class) {
    $prefix = "App\\";
    $baseUri = __DIR__ . "/app/";

    if(strpos($class, $prefix) !== 0) {
        return;
    }   

    $relativeClass = substr($class, strlen($prefix));

    $file = $baseUri . str_replace('\\', '/', $relativeClass) . '.php';

    if(file_exists($file)) {
        require $file;
    }
});