<?php

namespace Kernel;

// use PDOException;
use PDO, PDOException;

class Db
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = self::connect();
        }

        return self::$instance;
    }

    private static function connect()
    {
        $config = Core::$app->config['db'];

        try {
            $conn = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['password']);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $conn->exec('SET character_set_results=utf8');
            $conn->query('SET NAMES utf8');
            return $conn;
        } catch (PDOException $e) {
            var_dump($e);
        }

        return null;
    }
}
