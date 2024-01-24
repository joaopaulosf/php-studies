<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

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


