<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a valid password';
}

if (! empty($errors)) {
    view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('SELECT * FROM USERS WHERE email = :email', [
    'email' => $email
])->find();

if (! $user) {
    view('session/create.view.php', [
        'errors' => [
            'email' => 'No matching account for that email address.'
        ]
    ]);
}

login([
    'email' => $email,
    'username' => $username
]);