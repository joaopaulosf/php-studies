<?php

$heading = 'Note';
$config = require 'config.php';

$db = new Database($config);
$currentUserId = 4;

$note = $db->query('SELECT * FROM NOTES WHERE id = :id', [
    'id' => $_GET['id']
])->fetch();

if (!$note) {
    abort(Response::NOT_FOUND);
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}


require "views/note.view.php";

