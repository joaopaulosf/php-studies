<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 3;

$note = $db->query("SELECT * FROM NOTES WHERE id = :id", [
    'id' => $_POST['id']
])->get();

authorized($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['title'], 1, 100)) {
    $errors['title'] = 'A title of no more than 100 characters is required';
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (count($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
    die();
}

$db->query("UPDATE NOTES SET title = :title, body = :body WHERE id = :id", [
    'id' => $_POST['id'],
    'title' => $_POST['title'],
    'body' => $_POST['body']
]);

header("location: /notes");
die();

