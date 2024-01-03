<?php

require_once realpath(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dsn = 'mysql:host=localhost;port:3306;dbname=myapp;charset=utf8mb4';
$username = $_ENV['DB_USERNAME'];
$pwd = $_ENV['DB_PASSWORD'];

// dsn = data source name.
$pdo = new PDO($dsn, $username, $pwd);
$statement = $pdo->prepare('SELECT * FROM myapp.POSTS');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . " | " . $post['created_at'] . "</li>";
}
