<?php

require __DIR__ . "/autoload.php";

use App\Seeders\PostSeeder;
use App\Seeders\UserSeeder;

UserSeeder::run();
PostSeeder::run();