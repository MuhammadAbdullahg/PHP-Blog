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
    private $path;
    private $requestMethod;
    private $commonPath;
    private $requestUri;
    private $uri;

    public function uriPath() {
        return $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function getReqMet() {
        return $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function getCommonPath() {
        return $this->commonPath = "/PHP-Blog/public/";
    }

    public function getReqUri() {
        return $this->requestUri = str_replace("/PHP-Blog/public", "", $this->path);
    }

    public function getUri() {
        $uri = rtrim($this->requestUri, "/");

        if($uri == "") {
            $uri = "/";
        }
        return $this->uri = $uri;
    }

    public function configVar() {
        return ["path" => $this->uriPath(), "requestMethod" => $this->getReqMet(), "commonPath" => $this->getCommonPath(), "requestUri" => $this->getReqUri(), "uri" => $this->getUri()];
    }
}