<?php
// $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $requestMethod = $_SERVER['REQUEST_METHOD'];
// $commonPath = "/PHP-Blog/public/";

// $requestUri = str_replace("/PHP-Blog/public", "", $path);

// $uri = rtrim($requestUri, "/");

// if($uri == "") {
//     $uri = "/";
// }
namespace App\Config;
class AppConfig {
    private static $path;
    private static $requestMethod;
    private static $commonPath;
    private static $requestUri;
    private static $uri;

    public static function uriPath() {
        return self::$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function getReqMet() {
        return self::$requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    public static function getCommonPath() {
        return self::$commonPath = "/PHP-Blog/public/";
    }

    public static function getReqUri() {
        return self::$requestUri = str_replace("/PHP-Blog/public", "", self::$path);
    }

    public static function getUri() {
        $uri = rtrim(self::$requestUri, "/");

        if($uri == "") {
            $uri = "/";
        }
        return self::$uri = $uri;
    }

    public function configVar() {
        return ["path" => $this->uriPath(), "requestMethod" => $this->getReqMet(), "commonPath" => $this->getCommonPath(), "requestUri" => $this->getReqUri(), "uri" => $this->getUri()];
    }
}