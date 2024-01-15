<?php

$heading = 'New Note';
$config = require 'config.php';

$db = new Database($config);

$currentUserId = 3;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (strlen($_POST['title']) === 0) {
        $errors['title'] = 'A title is required';
    }

    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'A body is required';
    }

    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = 'The body can not be more than 1,000 characters.';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO NOTES (title, body, user_id) VALUES (:title, :body, :user_id)",
            [
                'title' => htmlspecialchars($_POST["title"]),
                'body' => htmlspecialchars($_POST["body"]),
                'user_id' => $currentUserId
            ]
        );
    }
}

require "views/note-create.view.php";

