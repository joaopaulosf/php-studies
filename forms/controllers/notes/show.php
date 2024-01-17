<?php

$heading = 'Note';
$config = require 'config.php';

$db = new Database($config);

$currentUserId = 3;

$note = $db->query("SELECT * FROM NOTES WHERE id = :id", [
    'id' => $_GET['id']
])->get();

authorized($note['user_id'] === $currentUserId);

require "views/notes/show.view.php";
