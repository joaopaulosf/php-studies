<?php

use Core\Database;

$config = require base_path('config/index.php');
$db = new Database($config);

$currentUserId = 3;

$note = $db->query("SELECT * FROM NOTES WHERE id = :id", [
    'id' => $_GET['id']
])->get();

authorized($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);



