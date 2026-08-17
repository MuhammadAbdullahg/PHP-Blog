<?php
return [
    "up" => "CREATE TABLE IF NOT EXISTS posts (
        id int(11) NOT NULL,
        user_id int(11) NOT NULL,
        file_name varchar(500) NOT NULL,
        title varchar(255) NOT NULL,
        category varchar(255) NOT NULL,
        image_path varchar(255) NOT NULL,
        content varchar(500) NOT NULL,
        likes bigint(20) NOT NULL,
        created_at date NOT NULL DEFAULT current_timestamp()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
    "down" => "DROP TABLE posts"
];