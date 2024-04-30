<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if(! $form->validete($email, $password)) {
    view('session/create.view.php', [
        'errors' => $form->errors()
    ]);
    die();
}

$user = $db->query('SELECT * FROM USERS WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    if( password_verify($password, $user['pwd'])) {
        login([
            'username' => $user['username'],
            'email' => $user['email']
        ]);

        header('location: /');
        exit();
    }
}

view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account for that email address and password.'
    ]
]);






