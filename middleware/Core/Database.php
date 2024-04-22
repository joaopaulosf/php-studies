<?php

namespace Core;

use JetBrains\PhpStorm\NoReturn;
use PDO;
use PDOStatement;

class Database
{
    public PDO $connection;
    public false|PDOStatement $statement;

    public function __construct(array $config)
    {
        $dsn = "mysql:" . http_build_query($config['db_config'], '', ';');
        $this->connection = new PDO($dsn, $config['db_user']['username'], $config['db_user']['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []): Database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    #[NoReturn] private function abort(int $code = 404): void
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

    public function findOrAbort($queryResult): void
    {
        $find = $queryResult;

        if (!$find) {
            $this->abort(Response::NOT_FOUND);
        }
    }

    public function get(): array
    {
        $queryResult = $this->statement->fetch();

        $this->findOrAbort($queryResult);

        return $queryResult;
    }

    public function getAll(): array
    {
        $queryResult = $this->statement->fetchAll();

        $this->findOrAbort($queryResult);

        return $queryResult;
    }

    public function find(): array|bool
    {
        return $this->statement->fetch();
    }
}