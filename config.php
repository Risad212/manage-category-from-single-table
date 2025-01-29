<?php

require 'vendor/autoload.php'; // Load Composer's autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // Point to your project folder
$dotenv->load(); // Load .env

// Access environment variables
$dbhost = getenv();
// $db = $_ENV('DB_NAME');
// $user = $_ENV('DB_USER');
// $pass = $_ENV('DB_PASS');


// Access environment variables


var_dump($dbhost);  // Shows all environment variables
