<?php
require 'vendor/autoload.php'; // Load Composer's autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // Point to your project folder
$dotenv->load(); // Load .env

// Access environment variables
$dbhost = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$dbuser = $_ENV['DB_USER'];
$dbpass = $_ENV['DB_PASS'];


