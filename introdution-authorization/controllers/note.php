<?php

$heading = 'Note';
$config = require 'config.php';

$db = new Database($config);

$currentUserId = 4;

$note = $db->query('SELECT * FROM NOTES WHERE id = :id', [
    'id' => $_GET['id']
])->get();

authorized($note['user_id'] === $currentUserId);

require "views/note.view.php";

