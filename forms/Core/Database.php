<?php

namespace Core;

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

    public function findOrNot($queryResult): void
    {
        $find = $queryResult;

        if (!$find) {
            abort(Response::NOT_FOUND);
        }
    }

    public function get(): array
    {
        $queryResult = $this->statement->fetch();

        $this->findOrNot($queryResult);

        return $queryResult;
    }

    public function getAll(): array
    {
        $queryResult = $this->statement->fetchAll();

        $this->findOrNot($queryResult);

        return $queryResult;
    }
}