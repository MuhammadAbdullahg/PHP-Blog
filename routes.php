<?php

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

if($path === '/PHP-blog/public/') {
    require __DIR__ . '/controllers/posts/index.php';
} else if($path === '/PHP-blog/public/addPost') {
    require __DIR__ . '/controllers/posts/addPost.php';
} else if($path === '/PHP-blog/public/login') {
    require __DIR__ . '/controllers/auth/login.php';
} else if($path === '/PHP-blog/public/register') {
    require __DIR__ . '/controllers/auth/register.php';
} else if($path === '/PHP-blog/public/logout') {
    require __DIR__ . '/controllers/auth/logout.php';
} else if($path === '/PHP-blog/public/post') {
    require __DIR__ . '/controllers/posts/post.php';
} else if($path === '/PHP-blog/public/category') {
    require __DIR__ . '/controllers/posts/category.php';
}