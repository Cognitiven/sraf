<?php
declare(strict_types=1);

namespace Framework\Components;

use Exception;
use PDO;

final class Database {
    private $db;

    public function __construct(array $args)
    {
        if (!isset($args['database'])) {
            throw new Exception('&args[\'database\'] is required');
        }

        if (!isset($args['username'])) {
            throw new Exception('&args[\'username\']  is required');
        }

        $type     = $args['type'] ?? 'mysql';
        $host     = $args['host'] ?? 'localhost';
        $charset  = $args['charset'] ?? 'utf8';
        $port     = isset($args['port']) ? 'port=' . $args['port'] . ';' : '';
        $password = $args['password'] ?? '';
        $database = $args['database'];
        $username = $args['username'];

        $this->db = new PDO("$type:host=$host;$port" . "dbname=$database;charset=$charset", $username, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo(): object
    {
        return $this->db;
    }

    public function raw(string $sql): void
    {
        $this->db->query($sql);
    }

    public function run(string $sql, array $args = []): object
    {
        if (empty($args)) {
            return $this->db->query($sql);
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);

        return $stmt;
    }

    public function rows(string $sql, array $args = [], object $fetchMode = PDO::FETCH_OBJ): object
    {
        return $this->run($sql, $args)->fetchAll($fetchMode);
    }

    public function row(string $sql, array $args = [], object $fetchMode = PDO::FETCH_OBJ): object
    {
        return $this->run($sql, $args)->fetch($fetchMode);
    }
    
    public function count(string $sql, array $args = []): int
    {
        return $this->run($sql, $args)->rowCount();
    }

    public function lastInsertId(): string
    {
        return $this->db->lastInsertId();
    }

    public function __destruct()
    {
        $this->db = null;
    }
}