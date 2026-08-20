<?php
return [
    "up" => "ALTER TABLE `posts`
        ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
        COMMIT;",
    "down" => "ALTER TABLE `posts`
        DROP CONSTRAINT `fk_post_user`;"
];