<?php

class DBConnect
{
    private static PDO $mysql;

    private function __construct()
    {
    }

    public static function getPDO(string $host, string $db, string $user, string $password): PDO
    {
        if (!isset(self::$mysql)) {
            self::$mysql = new PDO(sprintf('mysql:dbname=%s;host=%s', $db, $host), $user, $password);
        }
        return self::$mysql;
    }
}