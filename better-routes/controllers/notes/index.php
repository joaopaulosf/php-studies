<?php

use Core\Database;

$config = require base_path('config/index.php');

$db = new Database($config);

$notes = $db->query('SELECT id, title, user_id FROM NOTES WHERE user_id = :currentUserId', [
    'currentUserId' => 3
])->getAll();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);