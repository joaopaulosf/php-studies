<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 3;

$note = $db->query("SELECT * FROM NOTES WHERE id = :id", [
    'id' => $_GET['id']
])->get();

authorized($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);



