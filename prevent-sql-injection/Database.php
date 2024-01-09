<?php

class Database
{
    public PDO $connection;

    public function __construct(array $config)
    {
        $dsn = "mysql:" . http_build_query($config['db_config'], '', ';');
        $this->connection = new PDO($dsn, $config['db_user']['username'], $config['db_user']['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []): PDOStatement|bool
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}