<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please enter a password of seven or more characters';
}

if (!Validator::string($username, 3, 25)) {
    $errors['username'] = 'Please provide a valid username';
}

if (!empty($errors)) {
    view('registration/register.view.php', [
        'errors' => $errors
    ]);
    die();
};

$user = $db->query('SELECT * FROM USERS WHERE email = :email', [
    'email' => $email
])->find();

    if (!$user) {
    $db->query('INSERT INTO USERS (username, pwd, email) VALUES (:username, :password, :email)', [
        'username' => $username,
        'password' => $password,
        'email' => $email
    ]);

    $_SESSION['user'] = [
        'username' => $username
    ];

}
header('location: /');
exit();