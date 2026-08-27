<?php

use App\Controllers\AuthController;
use App\Core\Router;
use App\Controllers\PostsController;
use App\Middleware\AuthMiddleware;

$router = new Router();

$router->get("/login", [AuthController::class, "login"]);
$router->post("/login", [AuthController::class, "login"]);
$router->get("/register", [AuthController::class, "getRegister"]);
$router->post("/register", [AuthController::class, "register"]);
$router->get("/logout", [AuthController::class, "logout"]);

$router->get("/", [PostsController::class, "index"]);
$router->get("/addPost", [PostsController::class, "addPost"], AuthMiddleware::class);
$router->post("/addPost", [PostsController::class, "addPost"], AuthMiddleware::class);
$router->get("/post", [PostsController::class, "post"]);
$router->get("/posts", [PostsController::class, "posts"]);
$router->get("/allPosts", [PostsController::class, "allPosts"]);
$router->get("/category", [PostsController::class, "category"]);
$router->post("/category", [PostsController::class, "category"]);

return $router;