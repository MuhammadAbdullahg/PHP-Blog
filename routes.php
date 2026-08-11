<?php
$controller = '/controllers';

route('/', $controller . '/posts/index.php');
route('/addPost', $controller . '/posts/addPost.php');
route('/login', $controller . '/auth/login.php');
route('/register', $controller . '/auth/register.php');
route('/logout', $controller . '/auth/logout.php');
route('/post', $controller . '/posts/post.php');
route('/category', $controller . '/posts/category.php');