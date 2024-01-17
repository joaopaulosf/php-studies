<?php

require 'Validator.php';
$heading = 'New Note';
$config = require 'config.php';

$db = new Database($config);

$currentUserId = 3;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (!Validator::string($_POST['title'], 1, 100)) {
        $errors['title'] = 'A title of no more than 100 characters is required';
    }

    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required';
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

require "views/notes/create.view.php";

