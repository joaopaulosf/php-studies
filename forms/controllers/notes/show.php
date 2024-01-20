<?php

use Core\Database;

$config = require base_path('config/index.php');

$db = new Database($config);

$currentUserId = 3;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query("SELECT * FROM NOTES WHERE id = :id", [
        'id' => $_GET['id']
    ])->get();

    authorized($note['user_id'] === $currentUserId);

    $db->query("DELETE FROM NOTES WHERE id = :id", [
        'id' => $_POST['id']
    ]);

    header('location: /notes');
    die();
} else {

    $note = $db->query("SELECT * FROM NOTES WHERE id = :id", [
        'id' => $_GET['id']
    ])->get();

    authorized($note['user_id'] === $currentUserId);

    view('notes/show.view.php', [
        'heading' => 'Note',
        'note' => $note
    ]);
}


