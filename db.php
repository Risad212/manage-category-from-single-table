<?php
require_once('config.php');

function connectdb($dbhost, $dbuser, $dbpass, $dbname)
{
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
$connection = connectdb($dbhost, $dbuser, $dbpass, $dbname);


function show_menu($connection)
{
    $connect = $connection;
    $menu = '';

    $menu .= generate_menu($connect);

    return $menu;
}


function generate_menu($connect, $parent_id = NULL)
{
    $sql = '';
    $menu = '';

    if (is_null($parent_id)) {
        $sql = "SELECT * FROM `location` WHERE `parent_id` IS NULL";
    } else {
        $sql = "SELECT * FROM `location` WHERE `parent_id`=$parent_id";
    }

    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $menu .= '<li class="nav-item"><a class="nav-link" href="#">' . $row['name'] . '</a></li>';

        $menu .= '<ul class="dropdown-menu">' . generate_menu($connect, $row['id']) . '</ul>';

        $menu .= '</li>';
    }
    return $menu;
}
