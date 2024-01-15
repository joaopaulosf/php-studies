<?php

$heading = 'New Note';
$config = require 'config.php';

$db = new Database($config);

$currentUserId = 3;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query("INSERT INTO NOTES (title, body, user_id) VALUES (:title, :body, :user_id)",
        [
            'title' => $_POST["title"],
            'body' => $_POST["body"],
            'user_id' => $currentUserId
        ]
    );
}

require "views/note-create.view.php";

