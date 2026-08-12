<?php
$controller = '/controllers';

route($uri, '/', $controller . '/posts/index.php');
route($uri, '/addPost', $controller . '/posts/addPost.php');
route($uri, '/login', $controller . '/auth/login.php');
route($uri, '/register', $controller . '/auth/register.php');
route($uri, '/logout', $controller . '/auth/logout.php');
route($uri, '/post', $controller . '/posts/post.php');
route($uri, '/posts', $controller . '/posts/posts.php');
route($uri, '/allPosts', $controller . '/posts/allPosts.php');
route($uri, '/category', $controller . '/posts/category.php');