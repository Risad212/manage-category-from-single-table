<?php
require_once('config.php');

// Create connection
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$result = $connection->query("SELECT id, name, parent_id FROM location ORDER BY parent_id, name");
$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[$row['parent_id']][] = $row;
}
function buildMenu($parent_id = NULL)
{
    global $categories;
    if (!isset($categories[$parent_id])) return;
    echo '<ul class="' . ($parent_id === NULL ? 'navbar-nav' : 'dropdown-menu') . '">';
    foreach ($categories[$parent_id] as $cat) {
        $hasChildren = isset($categories[$cat['id']]);
        echo '<li class="nav-item' . ($hasChildren ? ' dropdown' : '') . '">';
        echo '<a class="nav-link ' . ($hasChildren ? 'dropdown-toggle' : '') . '" href="#" ' . ($hasChildren ? 'data-bs-toggle="dropdown"' : '') . '>' . $cat['name'] . '</a>';
        if ($hasChildren) buildMenu($cat['id']);
        echo '</li>';
    }
    echo '</ul>';
}
