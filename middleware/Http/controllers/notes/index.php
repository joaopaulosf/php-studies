<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT id, title, user_id FROM NOTES WHERE user_id = :currentUserId', [
    'currentUserId' => 3
])->getAll();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);