<?php
return [
    "up" => "CREATE TABLE `posts` (
        `post_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `user_id` int(11) NOT NULL,
        `file_name` varchar(500) NOT NULL,
        `title` varchar(255) NOT NULL,
        `category` varchar(255) NOT NULL,
        `image_path` varchar(255) NOT NULL,
        `content` TEXT NOT NULL,
        `views` bigint(20) NOT NULL DEFAULT 0,
        `status` varchar(255) NOT NULL DEFAULT 'approved',
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP()
        ON UPDATE CURRENT_TIMESTAMP(),
        `deleted_at` timestamp NULL DEFAULT NULL,
        FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
    "down" => "DROP TABLE posts"
];