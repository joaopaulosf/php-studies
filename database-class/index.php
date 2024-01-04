<?php

require_once realpath(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Database
{
    public PDO $connection;

    public function __construct()
    {
        $username = $_ENV['DB_USERNAME'];
        $pwd = $_ENV['DB_PASSWORD'];
        $dsn = 'mysql:host=localhost;port:3306;dbname=myapp;charset=utf8mb4';
        $this->connection = new PDO($dsn, $username, $pwd);
    }

    public function query(string $query): array
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

$db = new Database();
$posts = $db->query("SELECT * FROM myapp.POSTS");


foreach ($posts as $post) {
    echo "<li>" . $post['title'] . " | " . $post['created_at'] . "</li>";
}
