<?php

use Core\Database;

$config = require base_path('config/index.php');
$db = new Database($config);

$currentUserId = 3;

$note = $db->query("SELECT * FROM NOTES WHERE id = :id", [
    'id' => $_POST['id']
])->get();

authorized($note['user_id'] === $currentUserId);

$db->query("DELETE FROM NOTES WHERE id = :id", [
    'id' => $_POST['id']
]);

header('location: /notes');
die();


