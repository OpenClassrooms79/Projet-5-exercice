<?php

class DBConnect
{
    private static $mysql;

    private function __construct()
    {
    }

    public static function getPDO(string $host, string $db, string $user, string $password): PDO|false
    {
        if (!isset(self::$mysql)) {
            self::$mysql = new PDO(sprintf('mysql:dbname=%s;host=%s', $db, $host), $user, $password);
        }
        return self::$mysql;
    }
}