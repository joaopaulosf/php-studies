<?php

$heading = 'My Notes';
$config = require 'config.php';

$db = new Database($config);

$notes = $db->query('SELECT id, title, user_id FROM NOTES WHERE user_id = :currentUserId', [
    'currentUserId' => 4
])->getAll();

require "views/notes.view.php";
