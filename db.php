<?php
// Database credentials
$servername = "localhost"; // Or your server's IP
$username = "risad"; // Your MySQL username (usually 'root' in local setup)
$password = "Admin@1234#"; // Your MySQL password (empty in local setup)
$dbname = "self_join"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query to select all data from the 'menu_items' table
$query = "SELECT * FROM `location` WHERE parent_id IS NULL";
$result = $conn->query($query);

?>