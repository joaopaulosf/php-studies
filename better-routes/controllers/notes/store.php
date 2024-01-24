<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config/index.php');
$db = new Database($config);

$errors = [];

if (!Validator::string($_POST['title'], 1, 100)) {
    $errors['title'] = 'A title of no more than 100 characters is required';
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (!empty($errors)) {
    view('notes/create.view.php', [
        'heading' => 'New Note',
        'errors' => $errors
    ]);
    die();
}


$db->query("INSERT INTO NOTES (title, body, user_id) VALUES (:title, :body, :user_id)",
    [
        'title' => htmlspecialchars($_POST["title"]),
        'body' => htmlspecialchars($_POST["body"]),
        'user_id' => 3
    ]
);

header('location: /notes');
die();
