<?php
return [
    "up" => "CREATE TABLE IF NOT EXISTS `users` (
        `user_id` int(11) NOT NULL,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
    "down" => "DROP TABLE users"
];