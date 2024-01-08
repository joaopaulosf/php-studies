<?php

require 'Database.php';
$config = require('config.php');

$db = new Database($config);

$params = [':id' => $_GET['id']];

$posts = $db->query("SELECT * FROM POSTS WHERE id = :id", $params);

foreach ($posts as $post) {
    var_dump($post);
    echo "<li>" . $post['title'] . " | " . $post['created_at'] . "</li>";
}
