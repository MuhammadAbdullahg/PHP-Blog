<?php
return [
    "up" => "CREATE TABLE IF NOT EXISTS `users` (
        `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `username` varchar(255) NOT NULL,
        `useremail` varchar(255) NOT NULL UNIQUE,
        `password` varchar(255) NOT NULL,
        `status` varchar(255) NOT NULL DEFAULT 'active',
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP()
        ON UPDATE CURRENT_TIMESTAMP(),
        `deleted_at` timestamp NULL DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
    "down" => "DROP TABLE users"
];