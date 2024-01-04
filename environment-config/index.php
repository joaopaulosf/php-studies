<?php

require 'Database.php';
$config = require('config.php');

$db = new Database($config);

$posts = $db->query("SELECT * FROM myapp.POSTS");

foreach ($posts as $post) {
    var_dump($post);
    echo "<li>" . $post['title'] . " | " . $post['created_at'] . "</li>";
}
